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

                //makes sure not undefined
                if(typeof machines[i] !== "undefined"){

                    //appending machine name
                    $('#statuses').append("<p id=\"" +machines[i]['machineName']+ "\"> Machine Name: "  +machines[i]['machineName']+"</p>");
                    
                    //display "machine out of order" status bar 
                    if(machines[i]['status']==0){
                        $('#statuses').append("<div class=\"progress\"> <div class=\"progress-bar-striped bg-danger\" role=\"progressbar\" style=\"width: 100%\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\">Out of order</div></div>") 
                    }

                    //if machine is able to print
                    else{

                        //currently not in use
                        if(machines[i]['inUse']==0){
                            $('#statuses').append("<div class=\"progress\"> <div class=\"progress-bar-striped bg-info\" role=\"progressbar\" style=\"width: 100%\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\">Not performing job</div></div>") 
                        }
                        
                        //currently in use, inUse == 1
                        else{

                            //for the details of project being printed
                            var matchedProject;

                            //not inefficient double for loop since only select projects that don't have end time
                            for(var j=0;j<projects.length;j++){
                                if(projects[j]['machine']===machines[i]['machineName']){
                                    
                                    //save which project is being printed by this machine
                                    matchedProject = projects[j];

                                    //adding project print information next to machine name
                                    var el = document.getElementById(machines[i]['machineName']);
                                    el.innerHTML+= " ----- Started: " +projects[j]['startTime'] + " ----- By: " + projects[j]['userID'];

                                    //no need to check other projects if match is found
                                    break;
                                }
                            }

                            //time variables
                            var start = new Date(matchedProject['startTime']);
                            var eta = new Date(matchedProject['eta']);
                            var current = new Date();

                            //if project start time is AFTER current time
                            if(start > current){
                                $('#statuses').append("<div class=\"progress\"> <div class=\"progress-bar-striped bg-warning\" role=\"progressbar\" style=\"width: 100%\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\">Print not started yet</div></div>");
                            }

                            //if current time is AFTER end time
                            else if(current > eta){
                                $('#statuses').append("<div class=\"progress\"> <div class=\"progress-bar-striped bg-success\" role=\"progressbar\" style=\"width: 100%\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\">Print finished already</div></div>");
                            }

                            //currently printing
                            else{
                                var totalTime = eta-start;
                                var timeElapsed = current-start;
                                var percentage = timeElapsed/totalTime * 100;
                                $('#statuses').append("<div class=\"progress\"> <div class=\"progress-bar-striped progress-bar-animated bg-success\"  role=\"progressbar\" style=\"width: "+ percentage+"%\" aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\">"+percentage+"</div></div>");
                            }
                        }
                    }
                    
                }
            }
        }); 
        
        
        
    });

    
}

//populate the webpage with information upon load
$(document).ready(function(){

    //initial call
    status_bars();

    //repeating call every 10 seconds, uncomment for auto refresh
    setInterval(status_bars,10000);
});