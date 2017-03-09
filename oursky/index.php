<?php 
require_once('./includes/global.php');
$pageTitle = "Home";
require_once(ROOT . '/templates/header.php');
 ?>

<div style="width:100%px;align:center">
  <div class="banner" align="center"><img src="image/Group.png"><h1 align="center">Task Timer</h1></div>
  <div class="input">
    <form>
      <input class="form-control" width="50%" type="text" name="task" id="taskInput" placeholder="Enter task name">
      <a  onclick="addTask();"><img src="image/Group 3.png"></img></a>
    </form>
  </div>
  <div id="tasks" class="container" style="align:center">
  </div><br>
  <div id="finTasks" class="container" style="background-color: #E7E7E7">
  </div>
</div>

 <script type="text/javascript">
 var idcounter = 1;
 var index = [];
 var objArr = [];
 var task = [];
 var taskList = [];
 var finTaskID = [];

  function addTask() {
    var div = document.getElementById('tasks');
    task[idcounter-1] = document.getElementById('taskInput').value;
    
    var index = 0;
    var obj = new Timer();
    obj.Interval = 1000;
    obj.Tick = timer_tick;
    var temp = '';
    taskList[idcounter-1] = '<div class="row">';
    taskList[idcounter-1] += '<div class="col" font-size="30px">' +  task[idcounter-1] + '</div><div id="timer'+ idcounter +'" class="col" ></div><div id="stop_timer' + idcounter + '"  class="col"><a  onclick="objArr[' + (idcounter-1) + '].Stop()"><img src="image/Group 5.png"></img></a></div><a  onclick="finTask('+ (idcounter-1) +')"><img src="image/Group 4.png"></img></a></div>';
    taskList[idcounter-1] += '</div>';

    for(i = 0; i <idcounter; i++) {
      if (!(i in finTaskID)) temp += taskList[i];
    }
    div.innerHTML = temp;
    obj.Start(idcounter++);
    objArr.push(obj);
  }
  

  function finTask(id) {
    var div = document.getElementById('finTasks');
    var divTask = document.getElementById('tasks');
    var temp = '<div class="row">';
    var target = false;
    var tempTask = '';
    objArr[id].Stop();
    finTaskID.push(id);
    temp += '<div class="col" font-size="30px">' +  task[id] + '</div><div class="col" >'+ document.getElementById("timer" + (id+1)).textContent + '</div>';
    temp += '</div>';

    for(i = 0; i <idcounter; i++) {
      if (!(i in finTaskID)) tempTask += taskList[i];
    }
    divTask.innerHTML = tempTask;
    div.innerHTML = div.innerHTML + temp;

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
    this.Start = function(id)
    {
        this.Enable = new Boolean(true);
        index[id] =0;
        thisObject = this;
        if (thisObject.Enable)
        {
            thisObject.timerId = setInterval(
            function()
            {
                thisObject.Tick(id); 
            }, thisObject.Interval);
        }
    };
    
    // Function: Stops the timer
    this.Stop = function(id)
    { 
        thisObject.Enable = new Boolean(false);
        clearInterval(thisObject.timerId);
    };

};


function timer_tick(id)
{
 	index[id]  = index[id] + 1;
 	minute =  Math.floor(index[id] / 60);
 	second =  Math.floor(index[id] - minute*60);
 	document.getElementById("timer" + id).innerHTML = minute + " min " + second + " sec";
 	
 }
 
</script>
<?php
require_once(ROOT . '/templates/footer.php'); ?>
