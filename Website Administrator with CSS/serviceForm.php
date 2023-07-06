<?php
	
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
						<input type="text" class="input-field" placeholder="Equipment Used" name="equipmentUsed" value="">
                        <button class="btn-add-input" onclick="addEquipmentField()" type="button">+</button></td>
                        </fieldset>
                    <script>
                        const myEquipment = document.getElementById("equipmentUsed");

                        function addEquipmentField() {
                            console.log("Add button is clicked");
                            const addEq_wrapper = document.createElement("div");
                            const addEq = document.createElement("input");
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

                            addEq.type = "text";
                            addEq.name = "equipmentUsed";
                            addEq.setAttribute("required", "");
                            addEq.classList.add("input-field");
                            addEq.placeholder = "Equipment Used";

                            addEq_wrapper.appendChild(addEq);
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
						<input type="text" id="chemicalUsed" placeholder="Chemical Used" name="chemicalUsed" value="">
                        <button class="btn-add-input" onclick="addChemicalField()" type="button">+</button></td>
                        </fieldset>
                        <script>
                        const myChemical = document.getElementById("chemicalUsed");

                        function addChemicalField() {
                            console.log("Add button is clicked");
                            const addChem_wrapper = document.createElement("div");
                            const addChem = document.createElement("input");
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

                            addChem.type = "text";
                            addChem.name = "equipmentUsed";
                            addChem.setAttribute("required", "");
                            addChem.classList.add("input-field");
                            addChem.placeholder = "Chemical Used";

                            addChem_wrapper.appendChild(addChem);
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