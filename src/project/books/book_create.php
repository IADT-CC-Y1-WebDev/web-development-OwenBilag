<?php 
    // Require Lib Files
    require_once 'php/lib/config.php';
    require_once 'php/lib/session.php';
    require_once 'php/lib/forms.php';
    require_once 'php/lib/utils.php';

    // Start Session
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }

    // dd($_SESSION);

    try {
    // $genres = Genre::findAll();
    $formats = Format::findAll();
    $publishers = Publishers::findAll();
    }
    catch (PDOException $e) {
        setFlashMessage('error', 'Error: ' . $e->getMessage());
        redirect('/index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'php/inc/head_content.php'; ?>
    <title>New Book</title>
</head>
<body>
    <div class="container">
        <div class="width-12">
            <?php require 'php/inc/flash_message.php'; ?>
        </div>
        <div class="width-3">
        </div>
        <div class="width-6 forms">
            <h1>Add New Book</h1>
            <?php Book::findAll(); ?>
            <form class="form" id="create_form" action="book_store.php" method="POST" enctype="multipart/form-data"  novalidate>

                <div>
                    <div class="input">
                        <label class="special" for="title">Book Title:</label>
                        <input type="text" id="title" name="title" value="<?= h(old('title')) ?>">
                        <span id="title_error" class="error"><?= error('title') ?></span>                        
                    </div>
                </div>

                <div>
                    <div class="input">
                        <label class="special" for="author">Author:</label>
                        <input type="text" id="author" name="author" value="<?= h(old('author')) ?>">
                        <span id="author_error" class="error"><?= error('author') ?></span>
                    </div>
                </div>

                <div>
                    <div class="input">
                        <label class="special" for="publisher_id">Publisher:</label>
                        <div>
                            <select id="publisher_id" name="publisher_id" required>
                                <?php foreach ($publishers as $publisher) { ?>
                                    <option value="<?= h($publisher->id) ?>" <?= chosen('publisher_id', $publisher->id) ? "selected" : "" ?>>
                                        <?= h($publisher->name) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <span id="publisher_error" class="error"><?= error('publisher_id') ?></span>
                    </div>                  
                </div>

                <div>
                    <div class="input">
                        <label class="special" for="year">Year:</label>
                        <input type="text" id="year" name="year" value="<?= h(old('year')) ?>">
                    </div>
                    <span id="year_error" class="error"><?= error('year') ?></span>
                </div>

                <div>
                    <div class="input">
                        <label class="special" for="isbn">ISBN:</label>
                        <input type="text" id="isbn" name="isbn" value="<?= h(old('isbn')) ?>">
                    </div>                
                    <span id="isbn_error" class="error"><?= error('isbn') ?></span>
                </div>

                <div>
                    <div class="input">
                        <label class="special">Current Formats:</label><br>
                        <div>
                            <?php foreach ($formats as $format) { ?>
                                <div class="checkbox">
                                    <input type="checkbox" 
                                        id="format_<?= h($format->id) ?>" 
                                        name="format_ids[]" 
                                        value="<?= h($format->id) ?>"
                                        <?= chosen('format_ids', $format->id) ? "checked" : "" ?>
                                        >
                                    <label for="format_<?= h($format->id) ?>"><?= h($format->name) ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>                
                    <span id="formats_error" class="error"><?= error('format_ids') ?></span>
                </div>

                <div>
                    <div class="input">
                        <label class="special" for="description">Description:</label>
                        <textarea id="description" name="description" rows="5"><?= h(old('description')) ?></textarea>
                    </div>
                    <span id="description_error" class="error"><?= error('description') ?></span>
                </div>
                
                <div>
                    <div class="input">
                        <label class="special" for="cover_filename">Cover file image:</label>
                        <div>
                            <input type="file" id="cover_filename" name="cover_filename" accept="cover_filename/*">
                        </div>  
                    </div>
                    <span id="cover_error" class="error"><?= error('cover_filename') ?></span>
                </div>

                <div class="form-group input">
                    <button id="sbmt_btn" type="submit" class="button">Save Book</button>
                    <div class="button"><a href="book_list.php">Cancel</a></div>
                </div>   
                <script src="js/create.js"></script>                 
            </form>                 
        </div>
    </div>

    </body>
</html>
<?php
// Clear form data after displaying
clearFormData();
// Clear errors after displaying
clearFormErrors();
?>