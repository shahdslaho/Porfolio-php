<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Handle project deletion
if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header('Location: manage-projects.php');
    exit();
}

// Handle project addition
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO projects (title, description, image_url, project_url, order_number) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['title'],
        $_POST['description'],
        $_POST['image_url'],
        $_POST['project_url'],
        $_POST['order_number']
    ]);
    header('Location: manage-projects.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Projects</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
     
        .admin-dashboard {
            max-width: 1200px;
            margin: 40px auto;
            padding: 30px;
            background: rgba(0, 0, 0, 0.76);
            border-radius: 15px;
            box-shadow: 10px 20px 202px rgba(46, 1, 48, 0.3);
        }

        .admin-form {
            background: rgb(10, 10, 10);
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .admin-form input, .admin-form textarea {
            width: 100%;
            padding: 12px;
            background: rgba(4, 4, 4, 0.68);
            border: 1px solid rgba(255, 77, 166, 0.3);
            border-radius: 8px;
            color: white;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .admin-form input:focus, .admin-form textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 10px rgba(255, 77, 166, 0.2);
        }

        .admin-form textarea {
            height: 120px;
            resize: vertical;
        }

        .btn {
            background: var(--primary-color);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 77, 166, 0.3);
        }

        .projects-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 20px;
        }

        .project-card {
            background: rgba(5, 5, 5, 0.95);
            border-radius: 15px;
            padding: 25px;
            position: relative;
            transition: all 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .card-content {
            flex: 1;
        }

        .project-card h3 {
            color: var(--primary-color);
            font-size: 24px;
            margin-bottom: 15px;
        }

        .project-card p {
            color: #fff;
            font-size: 16px;
            line-height: 1.6;
            max-width: 80%;
        }

        .card-actions {
            margin-left: 20px;
        }

        .delete-btn {
            background: #ff4444;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            white-space: nowrap;
        }

        .delete-btn:hover {
            background: #ff2222;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 68, 68, 0.3);
        }

        .delete-btn i {
            font-size: 16px;
        }
        <style>
           
            .admin-dashboard {
                max-width: 1200px;
                margin: 40px auto;
                padding: 30px;
                background: #0a0a0a;
                border-radius: 15px;
                box-shadow: 0 8px 32px rgba(255, 77, 166, 0.1);
            }

            .admin-form {
                background: #111111;
                padding: 25px;
                border-radius: 10px;
                margin-bottom: 30px;
                border: 1px solid rgba(255, 77, 166, 0.1);
            }

            .admin-form input, .admin-form textarea {
                background: #0a0a0a;
                border: 1px solid rgba(255, 77, 166, 0.2);
                color: #ffffff;
            }

            .admin-form input:focus, .admin-form textarea:focus {
                border-color: #ff4da6;
                box-shadow: 0 0 10px rgba(255, 77, 166, 0.2);
            }

            .project-card {
                background: #111111;
                border: 1px solid rgba(255, 77, 166, 0.1);
            }

            .project-card h3 {
                color: #ff4da6;
            }

            .project-card p {
                color: #cccccc;
                margin-bottom: 15px;
            }

            .btn {
                background: #ff4da6;
            }

            .btn:hover {
                background: #ff66b2;
            }

            .delete-btn {
                background: #ff4444;
            }

            .delete-btn:hover {
                background: #ff2222;
            }

            .section-title {
                color: #ff4da6;
                text-shadow: 0 0 10px rgba(255, 77, 166, 0.3);
            }
            body {
                background: #000000;
            }

        </style>
    </style>
</head>
<body>
    <div class="admin-dashboard">
        <h2 class="section-title">Manage Projects</h2>
        
        <div class="admin-form">
            <h3>Add New Project</h3>
            <form method="POST">
                <div class="form-grid">
                    <input type="text" name="title" placeholder="Project Title" required>
                    <input type="text" name="image_url" placeholder="Image URL" required>
                    <input type="text" name="project_url" placeholder="Project URL" required>
                    <input type="number" name="order_number" placeholder="Order Number" required>
                </div>
                <textarea name="description" placeholder="Project Description" required></textarea>
                <button type="submit" class="btn">
                    <i class="fas fa-plus"></i> Add Project
                </button>
            </form>
        </div>

        <div class="projects-grid">
            <?php
            $stmt = $pdo->query("SELECT * FROM projects ORDER BY order_number");
            while($project = $stmt->fetch()) {
                echo "<div class='project-card'>";
                echo "<div class='card-content'>";
                echo "<h3>" . htmlspecialchars($project['title']) . "</h3>";
                echo "<p>" . htmlspecialchars(substr($project['description'], 0, 150)) . "...</p>";
                echo "</div>";
                echo "<div class='card-actions'>";
                echo "<a href='?delete=" . $project['id'] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this project?\")'>";
                echo "<i class='fas fa-trash'></i></a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>