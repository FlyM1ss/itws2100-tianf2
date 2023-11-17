<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lame Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="top-bar">
    <h1>Lame Management System</h1>
    <div>
        <button id="refresh">Refresh</button>
        <form method="post" action="index.php" style="display: inline;">
            <input type="submit" name="archive" id="archive-button" value="Archive"/>
        </form>
    </div>
</div>

<div id="main-container">
    <div id="nav-sidebar">
        <button id="show-grades">Progress</button>
        <!-- Navigation Preview -->
    </div>
    <div id="content-preview">
        <!-- Content preview -->
    </div>
</div>

<script>
    let courseData = {};

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "TeamSixteen16";
    $dbname = "lab6";
    $connection = new mysqli($servername, $username, $password, $dbname);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT `jsonObj` FROM `courses` WHERE title='Web Systems Development';";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courseData = json_decode($row['jsonObj'], true);
        }
    }

    $connection->close();

    echo 'courseData = ' . json_encode($courseData) . ';';
    ?>

    function buildNavigation(courseContents) {
        const sidebar = document.getElementById('nav-sidebar');
        sidebar.innerHTML = '';

        const createNavItem = (item, itemType) => {
            const div = document.createElement('div');
            div.className = 'nav-item';
            div.textContent = itemType + ': ' + item.title;
            div.onclick = () => updatePreview(item);
            return div;
        };

        for (let key in courseContents.Lectures) {
            if (courseContents.Lectures.hasOwnProperty(key)) {
                const item = courseContents.Lectures[key];
                const navItem = createNavItem(item, 'Lecture');
                sidebar.appendChild(navItem);
            }
        }

        for (let key in courseContents.Labs) {
            if (courseContents.Labs.hasOwnProperty(key)) {
                const item = courseContents.Labs[key];
                const navItem = createNavItem(item, 'Lab');
                sidebar.appendChild(navItem);
            }
        }
    }

    function updatePreview(item) {
        const preview = document.getElementById('content-preview');
        preview.innerHTML = `
    <h2>${item.title}</h2>
    <p>${item.description}</p>
    <a href="${item.link}" target="_blank">Access Material</a>
  `;
        document.querySelectorAll('.nav-item').forEach(navItem => {
            navItem.classList.remove('active');
        });
        event.currentTarget.classList.add('active');
    }

    document.getElementById('refresh').onclick = () => buildNavigation(courseData.Websys_course);

    buildNavigation(courseData.Websys_course);
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#show-grades').click(function(){
            $.ajax({
                url: 'get-grades.php', // PHP file to process the request
                type: 'GET',
                success: function(data) {
                    $('#content-preview').html(data); // Load the response into content-preview
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data: ', errorThrown);
                }
            });
        });
    });
</script>

</body>
</html>
