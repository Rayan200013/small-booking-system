<?php
// Establish connection to database
$con = mysqli_connect("localhost", "root", '', "hoteldb");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Retrieve selected room and number of nights from form
$room = $_POST['room'];
$nights = $_POST['nights'];

// Get price per night for selected room from database
if ($room == 1) {
  $price_per_night = 100;
} elseif ($room == 2) {
  $price_per_night = 200;
} elseif ($room == 3) {
  $price_per_night = 300;
} else {
  echo "Invalid room selection.";
  exit();
}

// Calculate total price based on number of nights
$total_price = $price_per_night * $nights;

// Insert booking information into database
if (isset($_POST['submit'])) {
  $room = $_POST['room'];
  $adults = $_POST['adults-select'];
  $children = $_POST['children-select'];
  $checkin = $_POST['checkin'];
  $checkout = $_POST['checkout'];
  $total_price = $_POST['total_price'];

  $query = "INSERT INTO bookings (room, adults, children, checkin, checkout, total_price) 
            VALUES ('$room', '$adults', '$children', '$checkin', '$checkout', '$total_price')";
  $result = mysqli_query($con, $query);

  if (!$result) {
    echo "Error: " . mysqli_error($con);
    exit();
  }

  // Redirect to book.html to gather more information
  header('Location: book.html');
  exit();
}

?>

<!-- Room selection form -->
<div class="col-lg-6">
  <div class="wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
    <form action="room.php" method="POST">
      <div class="row g-3">
        <div class="col-12">
          <div class="form-floating">
            <select name="room" id="room" class="form-select">
              <option value="1">Room 1</option>
              <option value="2">Room 2</option>
              <option value="3">Room 3</option>
            </select>
            <label for="room">Select A Room</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <select name="adults-select" id="adults-select" class="form-select">
              <option value="1">1</option>
              <!-- <option value="2">2</option> -->
            </select>
            <label for="select1">Select Adult</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <select name="children-select" id="children-select" class="form-select">
              <option value="0">0</option>
              <!-- <option value="1">1</option> -->
              <!-- <option value="2">2</option> -->
            </select>
            <label for="select2">Select Child</label>
        </div>
        </div>
                        <div class="col-md-6">
                          <div class="form-floating">
                            <button id="add-adult-btn" type="button" class="bttn">Add Adult</button>
                            <br>
                            <br>
                            <button id="remove-adult-btn" type="button" class="bttn">Remove Adult</button>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-floating">
                            <button id="add-child-btn" type="button" class="bttn">Add Child</button>
                            <br>
                            <br>
                            <button id="remove-child-btn" type="button" class="bttn"> Remove Child</button>
                         
                          </div>
                        </div>
                        </div>
                        <br>
                        <div class="col-12">
                            <div class="form-floating">
                                <input id="price" name="price" class="form-control" readonly>
                                <label for="price">Price:</label>
                              </div>
                        </div>
                        <p><span id="adults-count"></span></p>
                        <p><span id="children-count"></span></p>
                        <div class="col-md-6">
                          <div class="form-floating">
                        <div class="col-12">
                          <button id="submit-btn" type="submit" class="room-btn1">Confirm</button>
                      </div>
                          </div>
                        </div>
                      </div>
                    </form>              
                  </div>
              </div>
          </div>
      </div>
  </div>

