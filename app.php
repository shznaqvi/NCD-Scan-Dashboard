
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Responsive Layout Example</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.7/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.7/js/dataTables.bootstrap4.min.js"></script>

   <style>
        /* Your existing styles here */
        
        /* Sidebar Styles */
        /* ... */

        .container {
            margin-left: 250px;
            padding: 20px;
            margin-bottom: 40px; /* Add margin to the bottom */
        }
		
		 /* Custom primary and secondary colors */
        :root {
            --primary-color: #d1397e;
            --secondary-color: #8d33b5;
        }

        /* Update navbar and button colors */
        .navbar {
            background-color: var(--primary-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
		.footer, .navbar {
            background-color: var(--primary-color);
            color: white;
        }
		
		.icon-fixed-width {
        width: 24px; /* Set the icon width to 24px */
    }
	
	
		  #app.card {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 5px;
      }
      #app h1 {
        text-align: center;
        color: #4d4d4d;
      }
      #app p {
        color: #4d4d4d;
      }
      #app ul {
        list-style: none;
        margin: 0;
        padding: 0;
      }
      #app li {
        margin-bottom: 10px;
      }
      #app a.button {
        display: inline-block;
        padding: 8px 16px;
        background-color: #0077cc;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
      }
      #app a.button:hover {
        background-color: #d1397e;
      }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Wellness Scale App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="modal fade" id="addDistrictModal" tabindex="-1" role="dialog" aria-labelledby="addDistrictModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDistrictModalLabel">Add New District</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addDistrictForm">
                    <div class="form-group">
                        <label for="districtName">District Name</label>
                        <input type="text" class="form-control" id="districtName" name="districtName" required>
                    </div>
        <div class="alert alert-danger" id="modalAlert" style="display: none;"></div>
                    <button type="button" class="btn btn-primary" id="addDistrictBtn">Add District</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to toggle the user's status?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelToggle">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmToggle">Confirm</button>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
		
        <nav data-simplebar="init" id="sidebar" style="max-height: 100%; padding-top: 24px" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="side-nav-item">
                <a class="nav-link-ref sub-nav-link nav-link" data-menu-key="dashboard-overview" href="dashboard.php">
                    <i class="fas fa-chart-line fa-lg text-white mr-2 icon-fixed-width"></i>
                    <span> Dashboard Overview </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="nav-link-ref sub-nav-link nav-link" data-menu-key="user-management" href="users.php">
                    <i class="fas fa-users fa-lg text-white mr-2 icon-fixed-width"></i>
                    <span> User Management </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="nav-link-ref sub-nav-link nav-link" data-menu-key="data-analytics" href="/data.php">
                    <i class="fas fa-chart-bar fa-lg text-white mr-2 icon-fixed-width"></i>
                    <span> Data Analytics </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a class="nav-link-ref sub-nav-link nav-link" data-menu-key="settings" href="/settings">
                    <i class="fas fa-cog fa-lg text-white mr-2 icon-fixed-width"></i>
                    <span> Settings </span>
                </a>
            </li>
                    <!-- Add more sidebar items here -->
                </ul>
            </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

<div class="container">
  <div class="row justify-content-center">
        <div class="col-md-8">
                           <div id="app" class="card shadow-sm">
      <h1>WellnessScale v0.32.834</h1>
      <p>Welcome to the download page for WellnessScale version 0.32.834! You can download the app using the links below:</p>
      <ul>
        <li ><a id="android-download-button" href="./app/WellnessScale_2023_08_30_Dv834.apk" class="button">Download for Android</a></li>
      </ul>
    
	    <script src="script.js"></script>
            
            </div>
        </div>
    </div>

    <hr>
    <footer>
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2023 Wellness Scale App</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-dark">Terms of Use</a>
                <span class="text-muted mx-2">|</span>
                <a href="#" class="text-dark">Privacy Policy</a>
            </div>
        </div>
    </footer>
</div>
</main>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>