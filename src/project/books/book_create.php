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
    <?php require 'php/inc/flash_message.php'; ?>

    <h1>Add New Book</h1>
    <?php Book::findAll(); ?>
    <form action="book_store.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Book Title:</label>
            <input type="text" id="title" name="title" value="<?= h(old('title')) ?>">

            <div>
                <?php if (error('title')): ?>
                <p class="error"><?= error('title') ?></p>
                <?php endif; ?>
            </div>

        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <!-- TODO: Repopulate author field                               -->
            <input type="text" id="author" name="author" value="<?= h(old('author')) ?>">

            <!-- TODO: Display error message if author validation fails      -->
                <?php if (error('author')): ?>
                <p class="error"><?= error('author') ?></p>
                <?php endif; ?>
        </div>

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
                <p><?= error('publisher_id') ?></p>
            </div>
        </div>

        <div class="form-group">
            <label for="year">Year:</label>
            <!-- TODO: Repopulate year field                                 -->
            <input type="text" id="year" name="year" value="<?= h(old('year')) ?>">

            <!-- TODO: Display error message if year validation fails        -->
                <?php if (error('year')): ?>
                <p class="error"><?= error('year') ?></p>
                <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <!-- TODO: Repopulate ISBN field                                 -->
            <input type="text" id="isbn" name="isbn" value="<?= h(old('isbn')) ?>">

            <!-- TODO: Display error message if ISBN validation fails        -->
                <?php if (error('isbn')): ?>
                <p class="error"><?= error('isbn') ?></p>
                <?php endif; ?>
        </div>

        <div class="input">
            <label class="special">Current Formats:</label><br>
            <div>
                <?php foreach ($formats as $format) { ?>
                    <div>
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
            <p><?= error('format_ids') ?></p>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <!-- TODO: Repopulate description field                          -->
            <textarea id="description" name="description" rows="5"><?= h(old('description')) ?></textarea>

            <!-- TODO: Display error message if description validation fails -->
                <?php if (error('description')): ?>
                <p class="error"><?= error('description') ?></p>
                <?php endif; ?>
        </div>
        <div class="input">
            <label class="special" for="cover_filename">Image (required):</label>
            <div>
                <input type="file" id="cover_filename" name="cover_filename" accept="cover/*" required>
                <p><?= error('cover') ?></p>
            </div>
        </div>
        <div class="form-group input">
            <button type="submit" class="button">Save Book</button>
            <div class="button"><a href="book_list.php">Cancel</a></div>
        </div>
    </form>
    </body>
</html>
<?php
// Clear form data after displaying
clearFormData();
// Clear errors after displaying
clearFormErrors();
?>