<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Vote Update</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 32px;
            font-weight: 700;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 18px;
            font-weight: 600;
            color: #555;
            text-align: left;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"] {
            padding: 14px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
            outline: none;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
            transform: scale(1.02);
        }

        p {
            color: #333;
            font-size: 16px;
        }

        /* Notification styles */
        .notification {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4caf50;
            color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Update Votes</h1>
        <form id="voteForm">
            <label for="name">Candidate Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="votes">Number of Votes:</label>
            <input type="number" id="votes" name="votes" required>

            <input type="submit" value="Update Votes">
        </form>

        <div id="notification" class="notification"></div>
    </div>

    <script>
        document.getElementById('voteForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            var formData = new FormData(this);

            fetch('update_votes.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    // Show notification
                    var notification = document.getElementById('notification');
                    notification.innerText = 'Votes updated successfully!';
                    notification.style.opacity = '1';

                    // Hide notification after 3 seconds
                    setTimeout(function() {
                        notification.style.opacity = '0';
                    }, 3000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    var notification = document.getElementById('notification');
                    notification.innerText = 'Failed to update votes!';
                    notification.style.opacity = '1';

                    // Hide notification after 3 seconds
                    setTimeout(function() {
                        notification.style.opacity = '0';
                    }, 3000);
                });
        });
    </script>
</body>

</html>