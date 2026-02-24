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
        // Initialize form data array
        $data = [];
        // Initialize errors array
        $errors = [];

        // Check if request is POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exception('Invalid request method.');
        }

        // Get form data
        $data = [
            'title' => $_POST['title'] ?? null,
            'author' => $_POST['author'] ?? null,
            'publisher_id' => $_POST['publisher_id'] ?? null,
            'year' => $_POST['year'] ?? null,
            'isbn' => $_POST['isbn'] ?? null,
            'format_ids' => $_POST['format_ids'] ?? [],
            'description' => $_POST['description'] ?? null,
            'cover' => $_FILES['cover'] ?? null     
        ];

        // Define validation rules
        $year = date('Y');
        $rules = [
            'title' => "required|noempty|min:5|max:255",
            'author' => "required|noempty|min:5|max:255",
            'publisher_id' => "required|noempty|integer",
            'year' => "required|noempty|integer|minvalue:1900|maxvalue:" . $year, 
            'isbn' =>  "required|noempty|min:13|max:13",
            'format_ids' => "required|noempty|array|minvalue:1|maxvalue:4",
            'description' => "required|noempty|min:10",
            'cover' => "required|file|image|mimes:jpg,jpeg,png|max_file_size:5242880"
        ];
        // Validate all data (including file)
        $validator = new Validator($data, $rules);

        if ($validator->fails()) {
            // Get first error for each field
            foreach ($validator->errors() as $field => $fieldErrors) {
                $errors[$field] = $fieldErrors[0];
            }

            throw new Exception('Validation failed.');
        }

        // All validation passed - now process and save
        // Verify genre exists
        $format = Book::findById($data['format_ids']);
        if (!$genre) {
            throw new Exception('Selected format does not exist.');
        }

        // Process the uploaded image (validation already completed)
        $uploader = new ImageUpload();
        $cover_filename = $uploader->process($_FILES['image']);

        if (!$cover_filename) {
            throw new Exception('Failed to process and save the image.');
        }

        // Create new game instance
        $book = new Book();
        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->publisher_id = $data['publisher_id'];
        $book->year = $data['year'];
        $book->isbn = $data['isbn'];
        $book->format_id = $data['format_ids'];
        $book->description = $data['description'];
        $book->cover_filename = $coverFilename;

        // Save to database
        $game->save();
        // Create platform associations
        // if (!empty($data['platform_ids']) && is_array($data['platform_ids'])) {
        //     foreach ($data['platform_ids'] as $platformId) {
        //         // Verify platform exists before creating relationship
        //         if (Platform::findById($platformId)) {
        //             GamePlatform::create($game->id, $platformId);
        //         }
        //     }
        // }

        // Clear any old form data
        clearFormData();
        // Clear any old errors
        clearFormErrors();

        // Set success flash message
        setFlashMessage('success', 'Book stored successfully.');

        // Redirect to game details page
        redirect('game_view.php?id=' . $game->id);
    }
    catch (Exception $e) {
        // Error - clean up uploaded image
        if (isset($cover_filename) && $cover_filename) {
            $uploader->deleteImage($cover_filename);
        }

        // Set error flash message
        setFlashMessage('error', 'Error: ' . $e->getMessage());

        // Store form data and errors in session
        setFormData($data);
        setFormErrors($errors);

        redirect('book_create.php');
    }
