            var credentials = [["Sanath", "2141013", 10000],["Christo", "2141012", 10000],["Disha", "2141049", 10000]];

            var username = document.getElementById("username");
            var password = document.getElementById("password");
            
            var transfername = document.getElementById("transfername");
            var amount = document.getElementById("amount");

            var i = 0, j = 0;

            function transfer() {
                
                var uflag = 0, pflag = 0, tflag = 0, flag = 0;

                for(i = 0; i <= 4; i++) {
                    if(username.value == credentials[i][0]){
                        uflag++;
                        if(password.value == credentials[i][1]){
                            pflag++;
                            for(j = 0; j <= 4; j++) {
                                if(transfername.value == credentials[j][0]){
                                    credentials[i][2] = parseInt(credentials[i][2]) - parseInt(amount.value);
                                    credentials[j][2] = parseInt(credentials[j][2]) + parseInt(amount.value);
                                    
                                    document.getElementById("balance").innerHTML = credentials[i][2];
                                    tflag++;
                                }
                            }
                            if(tflag == 0){
                                document.getElementById("balance").innerHTML = "Invalid Transfer ID";
                            }
                        }
                    }
                }
                if(uflag == 0){
                    document.getElementById("balance").innerHTML = "Invalid User ID";
                }
                if(pflag == 0){
                    document.getElementById("balance").innerHTML = "Invalid Password";
                }
            }

            function bal() {
                
                var uflag = 0, pflag = 0, tflag = 0, flag = 0;
                
                for(i = 0; i <= 4; i++) {
                    if(username.value == credentials[i][0]){
                        uflag++;
                        if(password.value == credentials[i][1]){
                            pflag++;
                            document.getElementById("balance").innerHTML = credentials[i][2];
                        }
                    }
                }
                if(uflag == 0){
                    document.getElementById("balance").innerHTML = "Invalid User ID";
                }
                if(pflag == 0){
                    document.getElementById("balance").innerHTML = "Invalid Password";
                }
            }

            function openNav() {
                document.getElementById("myNav").style.width = "100%";
            }
         
            function closeNav() {
                document.getElementById("myNav").style.width = "0%";
            }