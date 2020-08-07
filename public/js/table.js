function clickSwitch() {
    'use strict';
    var isTab = 0;// 現在地判定
    var isWeekTab = 0;
    function setStateTabs(num){

      //一旦activeをリセット
      for (var i=0; i<3; i++){
        var weekNum = Math.floor(parseInt(num)/7);
        if(weekNum==i)continue;
        document.getElementById('w'+i).className = "ozTab tab_date";
      }
        //一旦activeをリセット
        for (var j=0; j<7; j++){
          if(num < 7){
            var tabNum = num;
          }else if(num >=7 && num<14){
            var tabNum = parseInt(num)-7;
          }else{
            var tabNum = parseInt(num)-14;
          }
          if(tabNum==j)continue;
          document.getElementById('t'+j).className = "ozTab";
          for(var k=0; k<21; k++){
          if(num==k)continue;
          document.getElementById('c'+k).className = "tabContent";
          document.getElementById('p'+k).className = "weekly_array";
          }
        }
      document.getElementById('w'+weekNum).className = "ozTab tab_date active_week";
      document.getElementById('t'+tabNum).className = "ozTab active";
      document.getElementById('c'+num).className = "tabContent active";
      document.getElementById('p'+num).className = "weekly_array active";
    }

      setStateTabs(0);
      for(var j=0; j<7; j++){

        for (var i=0; i<3; i++){
          //週のタブをクリックした時の動作
          document.getElementById('w'+i).addEventListener('click', function(){
            //weekNumへw+iのdata-numを代入
            var weekNum = this.getAttribute("data-num");
            weekNum = parseInt(weekNum)*7
            //クラスリセット
            for (var j=0; j<7; j++){
              document.getElementById('t'+j).className = "ozTab";
            }
            //曜日タブ位置リセット
            document.getElementById('t0').className = "ozTab active";
            if (isWeekTab == weekNum) return;
            isWeekTab = weekNum;
            setStateTabs(weekNum);
          });
        }

          //曜日のタブがクリックされた時の動作
          document.getElementById('t'+j).addEventListener('click', function(){
            //numへw+iのdata-numを代入
            var num = this.getAttribute("data-num");
            for (var k=0; k<3; k++){
              var element = document.getElementById('w'+k);
              if( element.className == 'ozTab tab_date active_week') {
                var weekNum = element.getAttribute("data-num");
              }
              var number = parseInt(weekNum)*7+parseInt(num);
            }
            console.log(number);//8
            if (isTab == number) return;
            isTab = number;
            setStateTabs(number);
          });

        }
      }



  document.addEventListener("DOMContentLoaded", clickSwitch, false);

 