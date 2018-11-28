/**
 *
 * @param machineReturn - name of function on what to do with success data
 */
function fetchMachines(machineReturn){
    return $.ajax({
        method: "POST",
        url: "controllers/machines_controller.php",
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
        url: "controllers/projects_controller.php",
        success: function(data){
            projectsReturn(JSON.parse(data));
        }
    });
}

function createStatusBars(){
    // $('#statuses').empty();
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
                    
                    //default status bar
                    $('#statuses').append("<div class=\"progress\"><div class=\"progress-bar-striped bg-info\" id=\"" + machines[i]['machineName'] + "_percentage\" role=\"progressbar\" style=\"width:100%\" aria-valuenow=\"100\"aria-valuemin=\"0\" aria-valuemax=\"100\"></div></div>");
                    
                }
            }
            //initial call
            updateStatusBars(machines,projects);
            //repeating call
            setInterval(function () {
                fetchMachines(function (m) {
                    fetchProjects(function (p) {
                       updateStatusBars(m, p);
                    })
                })
            }, 3000)
        }); 
    });
}
function updateStatusBars(machines,projects) {
    for (var i = 0; i < machines.length; i++) {
        // console.log(machines[i]);
        if (typeof machines[i] !== "undefined") {

            //variable to hold "[machineName]_percentage"
            var elem = document.getElementById(machines[i]['machineName'] + '_percentage');


            //display "machine out of order" status bar  
            if (machines[i]['status'] == 0) {
                elem.setAttribute('class', 'progress-bar-striped bg-danger');
                elem.setAttribute('aria-valuenow', '100');
                elem.innerHTML="Out of order";
            }    

            //if machine is able to print
            else {


                //currently not in use
                if (machines[i]['inUse'] == 0) {

                    elem.setAttribute('class', 'progress-bar-striped bg-info');
                    elem.innerHTML = "Not performing job";
                }

                //currently in use, inUse == 1
                else {

                    //for the details of the project being printed
                    var matchedProject;
                    
                    //look through every project
                    for (var j = 0; j < projects.length; j++){
                        //TODO: ACCOUNT FOR COMPLETED PROJECTS, MAKE SURE THEY DONT PASS THIS IF STATEMENT
                        if (!projects[j]['endTime']) {
                            if (projects[j]['machine'] === machines[i]['machineName']) {
                                matchedProject = projects[j];
                                var el = document.getElementById(machines[i]['machineName']);
                                el.innerHTML = " Machine Name: " + machines[i]['machineName'] + " ----- Started: " + projects[j]['startTime'] + " ----- By: " + projects[j]['userID'];
                                 //time calculation
                                var start = new Date(matchedProject['startTime']);
                                var eta = new Date(matchedProject['eta']);
                                
                                var current = new Date();
                                
                                //if project start time is AFTER current time
                                if (start > current) {
                                    elem.setAttribute('class', 'progress-bar-striped bg-warning');
                                    elem.setAttribute('aria-valuenow', '0');
                                    elem.innerHTML = "Print not started yet";
                                }

                                //if current time is AFTER end time
                                else if (current > eta) {
                                    elem.setAttribute('class', 'progress-bar-striped bg-success');
                                    elem.innerHTML = "Print finished already";
                                    
                                }
                                    
                                //under work currently
                                else {
                                    var totalTime = eta-start;
                                    var timeElapsed = current-start;
                                    var percentage = timeElapsed / totalTime * 100;
                                    elem.setAttribute('class', 'progress-bar-striped progress-bar-animated bg-success');
                                    elem.setAttribute('style', 'width: \"' + percentage + '\"%');
                                    elem.setAttribute('aria-valuenow', '50')
                                    elem.innerHTML = percentage.toFixed(2);
                                }
                                break;
                            }
                        }
                        else {
                            if (projects[j]['machine'] === machines[i]['machineName']) {
                                matchedProject = projects[j];
                                elem.setAttribute('class', 'progress-bar-striped bg-warning');
                                elem.innerHTML="DONE, PLEASE COME IN";
                            }
                        }
                    }
                }
            }
        }            

    }

}

//populate the webpage with information upon load
$(document).ready(function(){
    //initial call
    createStatusBars();
});

