<!-- resources/views/upload.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>

    <!-- CSS untuk desain form -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            font-size: 28px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .upload-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: inline-block;
            color: #555;
        }

        select, input[type="file"], button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        select:focus, input[type="file"]:focus {
            border-color: #5b9bd5;
            outline: none;
            box-shadow: 0 0 8px rgba(91, 155, 213, 0.6);
        }

        button {
            background-color: #5b9bd5;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #417dbd;
        }

        button:active {
            background-color: #34689c;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Tambahkan animasi untuk input */
        input[type="file"]::file-selector-button {
            padding: 5px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        input[type="file"]::file-selector-button:hover {
            background-color: #ddd;
        }

    </style>
</head>
<body>

    <div class="upload-container">
        <h1>Upload File</h1>

        <!-- Form upload file -->
        <form id="uploadForm" action="/upload" method="post" enctype="multipart/form-data">
            @csrf
            <label for="bucket">Select Bucket:</label>
            <select name="bucket" id="bucket" required>
                <option value="sekolah1">Sekolah 1</option>
                <option value="sekolah2">Sekolah 2</option>
                <option value="sekolah3">Sekolah 3</option>
            </select>

            <input type="file" name="file" required>

            <button type="submit">Upload</button>
        </form>
    </div>

    <!-- JavaScript untuk upload -->
    <script>
        // Tangkap event submit form
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah reload halaman
            var formData = new FormData(this);

            // Kirim request AJAX untuk upload file
            fetch('/upload', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === "File uploaded successfully") {
                    alert('File uploaded successfully!'); // Ganti dengan animasi pop-up jika diperlukan
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>

</body>
