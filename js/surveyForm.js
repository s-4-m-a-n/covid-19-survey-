  let errorFlag ;

    function formVerification(){

        errorFlag = true;

        let radios = document.getElementsByTagName('input');

        for (i = 0 ; i < radios.length ; i++ ){

                if (radios[i].value == 2 && radios[i].checked){

                        let txtarea = document.getElementById(radios[i].id+"+txt");

                        if (txtarea.value.length < 1){
                            document.getElementById(radios[i].id+"+alert").innerText = "text area cannot be blank!! if you want to give your own opinion";
                            errorFlag = false;
                        }
                        else{
                             document.getElementById(radios[i].id+"+alert").innerText = "";
                        }
                }
        }


        return errorFlag;
    }
