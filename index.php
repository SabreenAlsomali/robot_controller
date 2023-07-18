<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robot Controller</title>
</head>
<body>
    <style>
        .button {
  background-color: #008CBA; /* Blue */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin:10px;
  border-radius: 25px;
  border:2px #008CBA solid
}
.button_grey {
  background-color: #e7e7e7; /* Blue */
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin:10px;
  border-radius: 25px;
  border:2px #008CBA solid
}
.center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  margin-top:20vh;
}

.button:hover {
  background-color: #4CAF50; /* Green */
  color: white;
}

.button_grey:hover {
  background-color: #008CBA; /* Green */
  color: white;
}

    </style>
    <div style="">
        <center>
            <a href="History.php" class="button" >History</a>
            <a href="index.php"  class="button">Movment</a>
        </center>
    </div>
<div style="border:1px green solid;width:500px" class="center">
<br>
<center>
<button   class="button_grey" onclick="addMove('Forward')">Forward</button>
<br>
<button  class="button_grey"  onclick="addMove('Left')">Left</button>
<button   class="button_grey" onclick="addMove('Stop')">Stop</button>
<button   class="button_grey" onclick="addMove('Right')">Right</button>
<br>
<button   class="button_grey" onclick="addMove('Backward')">Backward</button>

</center>
<br><br>
</div>
<script>
    function addMove(the_move) {
 

    // Send a POST request to add_task.php
    fetch('save.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `move=${encodeURIComponent(the_move)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
          console.log(data)
        } else {
            alert(`Failed to save : ${data.error}`);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to add task.');
    });
}
</script>
</body>
</html>