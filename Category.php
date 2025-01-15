<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FFDAB9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }        

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Added transitions */
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, background-color 0.3s ease, transform 0.3s ease; /* Added background-color and transform transitions */
            background-color: #f9f9f9;
        }

        input:hover {
            background-color: #f1f1f1;
        }

        input:focus {
            border-color: #4caf50;
            background-color: #fff;
            box-shadow: 0 0 8px rgba(0, 150, 136, 0.5);
            transform: scale(1.02); /* Slight scale up when focused */
        }

        input[type="text"] {
            background-color: rgba(248, 215, 218, 0.9);
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            padding: 14px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(0, 150, 136, 0.5); 
        }
    </style>
</head>
<body>

<form action="add_category.php" method="post" enctype="multipart/form-data">
        <h2>Add Category</h2>

        <!-- Category Name -->
        <label for="categoryName">Category Name:</label>
        <input type="text" id="categoryName" name="categoryName" required>

        <!-- Category Image -->
        <label for="categoryImage">Category Image:</label>
        <input type="file" id="categoryImage" name="categoryImage" accept="image/*" required>

        <!-- Submit Button -->
        <input type="submit" value="Add Category">
    </form>

</body>
</html>