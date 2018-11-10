/**
 * 
 * @param machineReturn - name of function on what to do with success data
 */
function fetchMachines(machineReturn){
    return $.ajax({
        method: "POST",
        url: "../controllers/machines_controller.php",
        success: function(data){
            machineReturn(JSON.parse(data));
        }
    });
};

/**
 * 
 * @param projectsReturn - name of function on what to do with success data
 */
function fetchProjects(projectsReturn){
    return $.ajax({
        method: "POST",
        url: "../controllers/projects_controller.php",
        success: function(data){
            projectsReturn(JSON.parse(data));
        }
    });
}

function status_bars(){
   /**
     * machines[n][0] == inUSe
     * machines[n][1] == status
     * machines[n][2] == machineName
     * machines[n][3] == usePlastics
     */
    fetchMachines(function(machines){

        /**
         * pid
         * plastic
         * amount
         * payment
         * machine -> machineName
         * forClass
         * startTime
         * eta
         * endTime
         * success
         * timesFailed
         * plasticBrand
         * userID
         * userInit
         */
        //nested projects
        fetchProjects(function(projects){
            for(var i=0;i<machines.length;i++){
                if(typeof machines[i] !== "undefined"){
                    console.log(machines[i])
                    $('#statuses').append("<p id=\"" +machines[i]['machineName']+ "\"> Machine Name: "  +machines[i]['machineName']+"</p>");
                    if(machines[i]['status']==0){
                        //display out of order   
                        $('#statuses').append("<div class=\"progress\"> <div class=\"progress-bar-striped bg-danger\" role=\"progressbar\" style=\"width: 100%\" aria-valuenow=\"\" aria-valuemin=\"0\" aria-valuemax=\"100\">Out of order</div></div>") 
                    }
                    else{
                        if(machines[i]['inUse']==0){
                            //display not being used
                            $('#statuses').append("<div class=\"progress\"> <div class=\"progress-bar-striped bg-info\" role=\"progressbar\" style=\"width: 100%\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\">Not printing</div></div>") 
                        }
                        else{
                            //being used

                            $('#statuses').append("<div class=\"progress\"> <div class=\"progress-bar-striped bg-success\" role=\"progressbar\" style=\"width: 50%\" aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div></div>");
                        }
                    }
                    
                    //status bar display
                }
            }
            // for(var i=0;i<projects.length;i++){
            //     if(typeof projects[i] !== "undefined"){
            //         var date = new Date();
            //         console.log("current " + date);
            //         var start = new Date(projects[i]['startTime']);
            //         console.log("start " + start)
            //         console.log(projects[i]['startTime'])
                    
            //         console.log(projects[i]['eta'])
            //         $('#statuses').append("<p> Project: "  +projects[i]['pid']+"</p>");
            //     }
            // }
        }); 
        
        
        
    });

    
}

//populate the webpage with information upon load
$(document).ready(function(){

    //initial call
    status_bars();

    //repeating call every 10 seconds
    // setInterval(status_bars,10000);
});