<?php
require_once 'php/lib/config.php';
require_once 'php/lib/utils.php';

try {
    $books = Book::findAll();
    $pubs = Publishers::findAll();
    $forms = Format::findAll();
} 
catch (PDOException $e) {
    die("<p>PDO Exception: " . $e->getMessage() . "</p>");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'php/inc/head_content.php'; ?>
        <title>Books</title>
    </head>
    <body>
        <div class="head">
            <div class="container">
                <div class="width-12">
                    <?php require 'php/inc/flash_message.php'; ?>
                </div>
                <div class="width-12 main">
                    <h1>Book Storage</h1>                
                </div>
                <div class="width-12">
                    <div class="filters">
                        <div class="right">
                            <div class="button">
                                <a href="index.php">Home</a>
                            </div> 
                            <div class="button">
                                <a href="book_create.php">Add New Book</a>
                            </div> 
                        </div>
                        <div class="left">
                            <?php if (!empty($books)) { ?>
                                <form id="filtersForm">   
                                    <div>
                                        <label for="title_filter">Title:</label>
                                        <input type="text" id="title_filter" name="title_filter">
                                    </div>
                                    <div>
                                        <label for="publisher_filter">Publisher:</label>
                                        <select id="publisher_filter" name="publisher_filter">
                                            <option value="">All Publishers</option>
                                            <?php foreach ($pubs as $pub): ?>
                                                <option value="<?= htmlspecialchars($pub->name) ?>">
                                                    <?= htmlspecialchars($pub->name) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="formats_filter">Formats:</label>
                                        <select id="formats_filter" name="formats_filter">
                                            <option value="">All Formats</option>
                                            <?php foreach ($forms as $form): ?>
                                                <option value="<?= htmlspecialchars($form->name) ?>">
                                                    <?= htmlspecialchars($form->name) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>        
                                    <div class="input">
                                        <label class="filter-label" for="sort_by">Sort:</label>
                                        <div>
                                            <select id="sort_by" name="sort_by">
                                                <option value="title_asc">Title A–Z</option>
                                                <option value="year_desc">Year (newest first)</option>
                                                <option value="year_asc">Year (oldest first)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input">
                                        <button type="button" id="apply_filters">Apply Filters</button>
                                        <button type="button" id="clear_filters">Clear Filters</button>
                                    </div>   
                                </form>
                            <?php } ?> 
                        </div>
                    </div>
                </div>
            </div>       
        </div>

        <div class="container">
            <?php if (empty($books)) { ?>
                <p>No Books found.</p>
            <?php } else { ?>
                <div id="book_cards" class="width-12 cards delete">
                    <?php foreach ($books as $book) { ?>
                        <?php $pubById = Publishers::findById($book->publisher_id);
                        $formById = Format:: findByBook($book->id);?>

                        <div class="card"                        
                        data-title="<?= ($book->title) ?>"
                        data-publisher="<?= ($pubById->name) ?>"
                        data-formats="<?php
                                        foreach ($formById as $format) {
                                            echo htmlspecialchars($format->name) . " ";
                                        }; ?>"
                        data-year="<?= $book->year ?>"
                        >
                            <div class="top-content">
                                <h2><?= h($book->title) ?></h2>
                                <p>Release Year: <?= h($book->year) ?></p>
                                <p>Author: <?= h($book->author) ?></p>
                            </div>
                            <div class="bottom-content">
                                <img src="images/<?= h($book->cover_filename) ?>" alt="Image for <?= h($book->title) ?>" />
                                <div class="actions">
                                    <a href="book_view.php?id=<?= h($book->id) ?>">View</a>/ 
                                    <a href="book_edit.php?id=<?= h($book->id) ?>">Edit</a>/ 
                                    <a class="deleteBtn" href="book_delete.php?id=<?= h($book->id) ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <script src="./js/delete_confirm.js"></script> 
        <script src="./js/filters.js"></script>       
    </body>
</html>