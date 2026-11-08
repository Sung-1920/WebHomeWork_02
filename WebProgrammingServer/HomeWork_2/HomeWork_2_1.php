
<?php
$directory = "folders/";

if (!is_dir($directory)) {
    mkdir($directory);
}

// Delete Folder Function
function deleteFolder($path) {
    $items = scandir($path);

    foreach ($items as $item) {
        if ($item != "." && $item != "..") {
            $itemPath = $path . "/" . $item;

            if (is_dir($itemPath)) {
                deleteFolder($itemPath);
            } else {
                unlink($itemPath);
            }
        }
    }

    rmdir($path);
}

// Create Folder
if (isset($_POST['folderi'])) {
    $fold = trim($_POST['folderi']);

    if ($fold != "" && basename($fold) == $fold) {
        if (!file_exists($directory . $fold)) {
            mkdir($directory . $fold);
        }
    }

    header("Location: HomeWork_2_1.php");
    exit;
}

// Create File
if (isset($_POST['file'])) {
    $f = trim($_POST['file']);

    if ($f != "" && basename($f) == $f) {
        $filePath = $directory . $f . ".txt";

        if (!file_exists($filePath)) {
            file_put_contents($filePath, "");
        }
    }

    header("Location: HomeWork_2_1.php");
    exit;
}

// Rename and Delete
if (isset($_POST['action'])) {

    $name = $_POST['name'];

    if ($name != "" && basename($name) == $name) {

        $oldPath = $directory . $name;

        if ($_POST['action'] == "rename") {

            $newName = trim($_POST['new_name']);

            if ($newName != "" && basename($newName) == $newName) {

                $newPath = $directory . $newName;

                if (file_exists($oldPath) && !file_exists($newPath)) {
                    rename($oldPath, $newPath);
                }
            }
        }

        if ($_POST['action'] == "delete") {

            if (is_dir($oldPath)) {
                deleteFolder($oldPath);
            } elseif (is_file($oldPath)) {
                unlink($oldPath);
            }
        }
    }

    header("Location: HomeWork_2_1.php");
    exit;
}

// Save File Content
if (isset($_POST['save'])) {

    $name = $_POST['name'];

    if ($name != "" && basename($name) == $name) {

        $filePath = $directory . $name;

        if (is_file($filePath)) {

            $content = $_POST['content'];

            file_put_contents($filePath, $content);

            header("Location: HomeWork_2_1.php?open=" . urlencode($name));
            exit;
        }
    }
}

// Open File
$openFile = "";

if (isset($_GET['open'])) {

    $name = $_GET['open'];

    if ($name != "" && basename($name) == $name) {

        $filePath = $directory . $name;

        if (is_file($filePath)) {
            $openFile = $name;
            $content = file_get_contents($filePath);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeWork_2_1</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="div-2">

        <h1>
            <a href="HomeWork_2_1.php">Folders and Files</a>
        </h1>

        <h3>📁 Folders</h3>

        <div class="folders">

            <?php
            $items = scandir($directory);

            foreach ($items as $item) {

                if ($item != "." && $item != ".." && is_dir($directory . $item)) {

                    echo "<div class='item'>";

                    echo "📁 " . htmlspecialchars($item);

                    echo "<form method='post'>";

                    echo "<input type='hidden' name='name' value='" . htmlspecialchars($item, ENT_QUOTES) . "'>";

                    echo "<input type='text' name='new_name' placeholder='New name'>";

                    echo "<button type='submit' name='action' value='rename'>Rename</button>";

                    echo "<button type='submit' name='action' value='delete'>Delete</button>";

                    echo "</form>";

                    echo "</div>";
                }
            }
            ?>

        </div>

        <hr>

        <h3>📄 Files</h3>

        <div class="files">

            <?php
            foreach ($items as $item) {

                if ($item != "." && $item != ".." && is_file($directory . $item)) {

                    echo "<div class='item'>";

                    echo "<a href='HomeWork_2_1.php?open=" . urlencode($item) . "'>";

                    echo "📄 " . htmlspecialchars($item);

                    echo "</a>";

                    echo "<form method='post'>";

                    echo "<input type='hidden' name='name' value='" . htmlspecialchars($item, ENT_QUOTES) . "'>";

                    echo "<input type='text' name='new_name' placeholder='New name'>";

                    echo "<button type='submit' name='action' value='rename'>Rename</button>";

                    echo "<button type='submit' name='action' value='delete'>Delete</button>";

                    echo "</form>";

                    echo "</div>";
                }
            }
            ?>

        </div>

    </div>

    <?php if ($openFile != "") { ?>

        <div class="editor">

            <h2>📝 Edit File: <?php echo htmlspecialchars($openFile); ?></h2>

            <form method="post">

                <input type="hidden" name="name"
                    value="<?php echo htmlspecialchars($openFile, ENT_QUOTES); ?>">

                <textarea name="content"><?php echo htmlspecialchars($content); ?></textarea>

                <br><br>

                <button type="submit" name="save">💾 Save</button>

                <a href="HomeWork_2_1.php">Close</a>

            </form>

        </div>

    <?php } ?>

    <div class="div-1">

        <form method="post">

            <input type="text" name="folderi" placeholder="Folder name">

            - Create a Folder

            <br><br>

            <button type="submit">Create Folder</button>

            <br><br>

        </form>

        <hr><hr>

        <form method="post">

            <input type="text" name="file" placeholder="File name">

            - Create a file

            <br><br>

            <button type="submit">Create File</button>

            <br><br>

        </form>

    </div>

</body>
</html>
