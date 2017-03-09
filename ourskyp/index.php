<?php 
require_once('./includes/global.php');
$pageTitle = "Home";
require_once(ROOT . '/templates/header.php');
 ?>

<div style="width:1080px">
 <div class="banner" align="center"><img src="image/Group.png"><h1 align="center">Task Timer</h1></div>
  <div class="input">
   <form >
    <input class="form-control" width="50%" type="text" name="task" id="taskInput" placeholder="Enter task name">
    <a  onclick="addTask();obj.Start()"><img src="image/Group 3.png"></img></a>
   </form>
  </div>
 </div>
  <!--<button type="button"><img src="image/Group 3.png"></button></div>-->

 <div id="tasks" class="container">
  <div class="row">
    <div id="newTask" class="col" font-size="30px"></div>
    <div id="timer" class="col" ></div>
    <div id="stop_timer"  class="col"><a  onclick="obj.Stop()"><img src="image/Group 5.png"></img></a></div>
  </div>
</div>
 
 <script type="text/javascript">
 
  function addTask() {
    var div = document.getElementById('tasks');
    var task = document.getElementById('taskInput').value;
    
    div.innerHTML = div.innerHTML + task;
    
    
  }
  


var Timer = function()
{        
    // Property: Frequency of elapse event of the timer in millisecond
    this.Interval = 1000;
    
    // Property: Whether the timer is enable or not
    this.Enable = new Boolean(false);
    
    // Event: Timer tick
    this.Tick;
    
    // Member variable: Hold interval id of the timer
    var timerId = 0;
    
    // Member variable: Hold instance of this class
    var thisObject;
    
    // Function: Start the timer
    this.Start = function()
    {
        this.Enable = new Boolean(true);

        thisObject = this;
        if (thisObject.Enable)
        {
            thisObject.timerId = setInterval(
            function()
            {
                thisObject.Tick(); 
            }, thisObject.Interval);
        }
    };
    
    // Function: Stops the timer
    this.Stop = function()
    { 
        thisObject.Enable = new Boolean(false);
        clearInterval(thisObject.timerId);
    };

};


 var index = 0;
 var obj = new Timer();
 obj.Interval = 1000;
 obj.Tick = timer_tick;
 // obj.Start();

function timer_tick()
{
 	index  = index + 1;
 	minute =  Math.floor(index / 3600);
 	second =  Math.floor(index - minute*3600);
 	document.getElementById("timer").innerHTML = minute + ":" + second;
 	
 }
 
</script>
<?php
require_once(ROOT . '/templates/footer.php'); ?>
