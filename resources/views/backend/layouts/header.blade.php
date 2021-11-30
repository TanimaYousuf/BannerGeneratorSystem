<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('banners.index')}}"><img src="{{asset('backend/assets/img/icon.png')}}" class="mr-2 img-fluid" alt="logo"/>BGS</a>
        <a class="navbar-brand nav-logo" href="{{route('banners.index')}}"><img src="{{asset('backend/assets/img/icon.png')}}" class="mr-2 img-fluid" alt="logo"/>BGS</a>
    </div>

    </div>

    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <h4 class="Task-Management-Platform Task-Management-Platform-big-screen">Banner Generator System</h4>
        <ul class="navbar-nav navbar-nav-right">
            <p class="Timestamp-BG"><span id="date"></span><span id="clock"><span></p>
            <li class="nav-item header-create-button">
                
            </li>
            <a class="nav-item nav-profile">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 0 24 24" width="30"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg> 
            </a>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>

<script>
    $(document).ready(function(){
        setInterval('updateClock()', 1000);
        getTodayDate();
    });

function getTodayDate(){
    const monthNames = ["Jan", "Feb", "March", "April", "May", "June",
          "July", "August", "Sept", "Oct", "Nov", "Dec"
    ];
    const d = new Date();
    const date = d.getDate() + " " +monthNames[d.getMonth()] + ', '+ d.getFullYear()+ ' ';
    $("#date").html(date);
}

function updateClock (){
 	var currentTime = new Date ( );
  	var currentHours = currentTime.getHours ( );
  	var currentMinutes = currentTime.getMinutes ( );
  	var currentSeconds = currentTime.getSeconds ( );

  	// Pad the minutes and seconds with leading zeros, if required
  	currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  	currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  	// Choose either "AM" or "PM" as appropriate
  	var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  	// Convert the hours component to 12-hour format if needed
  	currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  	// Convert an hours component of "0" to "12"
  	currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  	// Compose the string for display
  	var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;


   	$("#clock").html(currentTimeString);
 }
</script>