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


//populate the webpage with information upon load
$(document).ready(function(){

    /**
     * machines[n][0] == inUSe
     * machines[n][1] == status
     * machines[n][2] == machineName
     * machines[n][3] == usePlastics
     */
    fetchMachines(function(data){
        for(var i=0;i<data.length;i++){
            if(typeof data[i] !== "undefined"){
                console.log(data[i])
                $('#statuses').append("<p> Machine Name: "  +data[i][2]+"</p>");
            }
        }
    });
    fetchProjects(function(data){
        for(var i=0;i<data.length;i++){
            if(typeof data[i] !== "undefined"){
                console.log(data[i])
                // $('#statuses').append("<p> Machine Name: "  +data[i][2]+"</p>");
            }
        }
    });
    // e.preventDefault();

    // var machineData = fetchMachines();
    // console.log(machineData);
    /**
     * obj[n][0] = inUse
     * obj[n][1] = status
     * obj[n][2] = machineName
     * obj[n][3] = usesPlastic
     * 
     */
    //index 3 is the name of the machine, index 0 is the machine id
    //parses machine information
    // for(var i=0;i<machineData.length;i++){
    //     if(typeof machineData[i] !== "undefined"){
    //         console.log(machineData[i])
    //         $('#statuses').append("<p> Machine Name: "  +machineData[i][2]+"</p>");
    //     }
    // }

    // var projectData = fetchProjects();
    // for(var i=0;i<projectData.length;i++){
    //     if(typeof obj[i] !== "undefined"){
    //         console.log(projectData[i]);
    //     }
    // }

    



});