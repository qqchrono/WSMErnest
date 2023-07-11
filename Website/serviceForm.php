<?php
	session_start();
    
?>

<!DOCTYPE html>
<html>
<head>
<title>Water Supply Management</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="serviceForm.css">
</head>
<body>

<form action="serviceForm.php" method="POST">
	<h2>Service Form</h2>
   
		<table align="center">
                    <tr>
						<td><label for="ticketId">Ticket ID : </label>
						<input type="text" id="ticketId" placeholder="Ticket ID" name="ticketId" value=""></td>
					</tr>
					<tr>
						<td><label for="companyUEN">Company UEN : </label>
						<input type="text" id="companyUEN" placeholder="Company UEN" name="companyUEN" value=""></td>
					</tr>
                    <tr>
						<td><label for="staffName">Staff Name : </label>
						<input type="text" id="staffName" placeholder="Staff Name" name="staffName" value=""></td>
					</tr>
					<tr>
						<td><label for="startTime">Start Time : </label>
						<input type="datetime-local" id="startTime" name="startTime" value=""></td>
					</tr>
					<tr>
						<td><label for="endTime">End Time : </label>
						<input type="datetime-local" id="endTime" name="endTime" value=""></td>
					</tr>
					<tr>
						<td><label for="details">Details : </label>
						<textarea id="details" class="details" placeholder="Details of the solution" name="details" rows="4" cols="51" value=""></textarea></td>
					</tr>
					<tr>
						<td><label for="equipmentUsed">Equipment Used : </label>
                        <fieldset class="input-set input-field eq-fieldset" id="equipmentUsed">
                        <select name="equipmentUsed" class="input-field">
                        <?php
                         require_once 'Equipments/classes.php';
                            $equipment = new equipmentView;
                            $result = $equipment -> getData(111111);
                            $equipment_array=[];
                            if($result)
                            {
                                foreach($result as $row)
                                {
                                    echo "<option>".$row['equipmentName'] ."</option>";
                                    array_push($equipment_array,$row['equipmentName']);
                                }
                            
                            }
                            $_SESSION['equiparray']= $equipment_array;

                            
                            
                            ?>
                    </select>
                        <input type="text" class="input-field" placeholder="Equipment Used Quantity" name="equipmentQuantity" value="">
                        <button class="btn-add-input" onclick="addEquipmentField()" type="button">+</button></td>
                        </fieldset>
                       
                    
                    <script>
                        const myEquipment = document.getElementById("equipmentUsed");

                        function addEquipmentField() {
                            console.log("Add button is clicked");
                            const addEq_wrapper = document.createElement("div");
                            const addEq = document.createElement("select");
                            
                            const addEqQuantity = document.createElement("input");
                            const btnAdd = document.createElement("button");
                            const btnDel = document.createElement("button");

                            addEq_wrapper.classList.add("equipment-input");

                            btnAdd.type = "button";
                            btnAdd.classList.add("btn-add-input");
                            btnAdd.innerText = "+";
                            btnAdd.setAttribute("onclick", "addEquipmentField()");

                            btnDel.type = "button";
                            btnDel.classList.add("btn-del-input");
                            btnDel.innerText = "-";
                            <?php
                                $array = $_SESSION['equiparray'];
                
                                foreach ($array as $row){
                                    echo "const option".array_search($row,$array)." = document.createElement('option');\n";

                                    echo "option".array_search($row,$array).".innerText ='".($row)."';\n";
                                
                                }
                                
                            ?>
                            
            
                            addEq.name = "equipmentUsed";
                            addEq.setAttribute("required", "");
                            addEq.classList.add("input-field");
                            addEq.placeholder = "Equipment Used";

                            addEqQuantity.type = "text";
                            addEqQuantity.name = "equipmentQuantity";
                            addEqQuantity.classList.add("input-field");
                            addEqQuantity.placeholder = "Equipment Used Quantity";
                            <?php
                            $array = $_SESSION['equiparray'];
                            foreach ($array as $row){
                                ?>addEq.appendChild<?php echo "(option".array_search($row,$array).")\n";?> <?php
                    
                            }
                            
                            ?>
                            

                            addEq_wrapper.appendChild(addEq);
                            addEq_wrapper.appendChild(addEqQuantity);
                            addEq_wrapper.appendChild(btnAdd);
                            addEq_wrapper.appendChild(btnDel);

                            myEquipment.appendChild(addEq_wrapper);
                            btnDel.addEventListener("click", removeEquipment);
                        }

                        function removeEquipment(eq) {
                            const equipmentField = eq.target.parentElement;
                            equipmentField.remove();
                        }
                    </script>
                    </tr>
					<tr>
						<td><label for="chemicalUsed">Chemical Used : </label>
                        <fieldset class="input-set input-field chem-fieldset" id="chemicalUsed" >
                        <select name="chemicalUsed" class="input-field">
                        <?php
                         require_once 'Chemicals/classes.php';
                            $chemical = new chemicalView;
                            $result = $chemical -> getData(111111);
                            $chem_array=[];
                            if($result)
                            {
                                foreach($result as $row)
                                {
                                    echo "<option>".$row['chemicalName'] ."</option>";
                                    array_push($chem_array,$row['chemicalName']);
                                }
                            
                            }
                            $_SESSION['chemarray']= $chem_array;

                            
                            
                            ?>
                        </select>
                        <input type="text" class="input-field" placeholder="Chemical Used Use Time" name="chemicalUseTime" value="">
                        <input type="text" class="input-field" placeholder="Chemical Used Quantity" name="chemicalQuantity" value="">
                        <button class="btn-add-input" onclick="addChemicalField()" type="button">+</button></td>
                        </fieldset>
                        <script>
                        const myChemical = document.getElementById("chemicalUsed");

                        function addChemicalField() {
                            console.log("Add button is clicked");
                            const addChem_wrapper = document.createElement("div");
                            const addChem = document.createElement("select");
                           
                            const addChemQuantity = document.createElement("input");
                            const addChemUseTime = document.createElement("input");
                            const btnAdd = document.createElement("button");
                            const btnDel = document.createElement("button");

                            addChem_wrapper.classList.add("chemical-input");
                            
                            
                            btnAdd.type = "button";
                            btnAdd.classList.add("btn-add-input");
                            btnAdd.innerText = "+";
                            btnAdd.setAttribute("onclick", "addChemicalField()");

                            btnDel.type = "button";
                            btnDel.classList.add("btn-del-input");
                            btnDel.innerText = "-";

                            <?php
                                $array = $_SESSION['chemarray'];
                
                                foreach ($array as $row){
                                    echo "const option".array_search($row,$array)." = document.createElement('option');\n";

                                    echo "option".array_search($row,$array).".innerText ='".($row)."';\n";
                                
                                }
                                
                            ?>

                            addChem.name = "chemicalUsed";
                            addChem.setAttribute("required", "");
                            addChem.classList.add("input-field");
                            addChem.placeholder = "Chemical Used";

                            addChemUseTime.type = "text";
                            addChemUseTime.name = "chemicalUseTime";
                            addChemUseTime.classList.add("input-field");
                            addChemUseTime.placeholder = "Chemical Used Use Time";

                            addChemQuantity.type = "text";
                            addChemQuantity.name = "chemicalQuantity";
                            addChemQuantity.classList.add("input-field");
                            addChemQuantity.placeholder = "Chemical Used Quantity";

                            <?php
                            $array = $_SESSION['chemarray'];
                            foreach ($array as $row){
                                ?>addChem.appendChild<?php echo "(option".array_search($row,$array).")\n";?> <?php
                    
                            }
                            
                            ?>

                            addChem_wrapper.appendChild(addChem);
                            addChem_wrapper.appendChild(addChemUseTime);
                            addChem_wrapper.appendChild(addChemQuantity);
                            addChem_wrapper.appendChild(btnAdd);
                            addChem_wrapper.appendChild(btnDel);

                            myChemical.appendChild(addChem_wrapper);
                            btnDel.addEventListener("click", removeChemical);
                        }

                        function removeChemical(chem) {
                            const chemicalField = chem.target.parentElement;
                            chemicalField.remove();
                        }
                    </script>
					</tr>
					<tr>
						<td class="button-container">
							<input type="submit" name="submit" value="Submit" style="border-radius: 5px;">
							<a href="#"><button type="button" style="border-radius: 5px">Back</button></a>	
						</td>
					</tr>
		</table>

</form>
</body>
</html>