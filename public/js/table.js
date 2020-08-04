function clickSwitch() {
    'use strict';
    var isTab = 0; // 現在地判定
    function setState(num){
      for (var i=0; i<7; i++){
        if(num==i)continue;
        document.getElementById('t'+i).className = "ozTab";
        document.getElementById('c'+i).className = "tabContent";
        document.getElementById('p'+i).className = "weekly_array";
      }

      document.getElementById('t'+num).className = "ozTab active";
      document.getElementById('c'+num).className = "tabContent active";
      document.getElementById('p'+num).className = "weekly_array active";
    }
    
    function setWeekState(num){
      for (var i=0; i<3; i++){
        if(num==i)continue;
        document.getElementById('w'+i).className = "ozTab tab_date";
      }

      document.getElementById('w'+num).className = "ozTab tab_date active_week";
    }

    setState(0);
    for (var i=0; i<7; i++){
      document.getElementById('t'+i).addEventListener('click', function(){
      var num = this.getAttribute("data-num");
        if (isTab == num) return;
        isTab = num;
        setState(num);
      });
    }

    setWeekState(0);
    for (var i=0; i<3; i++){
      document.getElementById('w'+i).addEventListener('click', function(){
      var num = this.getAttribute("data-num");
        if (isTab == num) return;
        isTab = num;
        setWeekState(num);
      });
    }

  }



  document.addEventListener("DOMContentLoaded", clickSwitch, false);

 