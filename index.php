<?php
echo "<h2>How to check if PHP is running via XAMPP locally or inside a Docker container:</h2>";
echo "<ul>";
echo "<li>If you are using XAMPP, you typically access your project via <code>http://localhost/your_project</code> and XAMPP Control Panel manages Apache and MySQL services.</li>";
echo "<li>If you are using Docker, you usually start containers with <code>docker-compose up</code> or <code>docker run</code>, and your project may be mapped to a container volume. You can check running containers with <code>docker ps</code>.</li>";
echo "<li>In <b>phpinfo()</b> output above, look for environment variables or paths that mention <code>xampp</code> or <code>docker</code> to help identify the environment.</li>";
echo "</ul>";