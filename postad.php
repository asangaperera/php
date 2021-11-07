<?php
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>SUPERMARKET</h1>
				<a href="sp_seller_edit.php"><i class="fas fa-user-circle"></i>Edit ITEMS</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				<a href="home_seller.php"><i class="fas fa-user-circle"></i>Home</a>
                
		</nav>
		<div class="content">
			<h2>Add Items Page</h2>
			<p> Add new Items</p>
		</div>
		</nav>
		<div class="content">
			
		
	<div>


<div class="content">
 
  <form method="POST" action="home_seller.php" enctype="multipart/form-data" style="width: 200px; ">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>
      <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="discription" 
        placeholder="Discription of the Medicine"></textarea>
    </div>
    <div>
    	<div>
<br>
<tr><tr>
<td> Category : 
</td>
<td> 
<select name="sp_category" required/>
<option selected hidden value=""> Select Category </option>
<option value="Any Part of Accessory">Any Part of Category </option>
<option value="Analgesics ">Analgesics </option>
<option value="Antacids: ">Antacids: </option>
<option value="Antianxiety Drugs:: ">Antianxiety Drugs:: </option>
<option value="Antiarrhythmics: : ">Antiarrhythmics: : </option>
<option value="Antibacterials: : "> Antibacterials: : </option>
<option value="Antibiotics: ">Antibiotics: : </option>
<option value="Anticoagulants and Thrombolytics: ">Anticoagulants and Thrombolytics: </option>
<option value="Anticonvulsants:  ">Anticonvulsants:  </option>
<option value="Antidepressants: ">Antidepressants:</option>
<option value="Antidiarrheals: ">Antidiarrheals: </option>
<option value="Antiemetics: ">Antiemetics: </option>
<option value="Antifungals: ">Antifungals: </option>
<option value="Antihistamines:  ">Antihistamines:  </option>
<option value="Antihypertensives:">Antihypertensives:</option>
<option value="Anti-Inflammatories:  ">Anti-Inflammatories:  </option>
<option value="    Antineoplastics: Drugs used to treat cancer.    ">    Antineoplastics: Drugs used to treat cancer.        </option>
<option value="   Antipsychotics:   ">   Antipsychotics:          </option>
<option value="   Antipyretics: Drugs that reduce fever.">   Antipyretics: Drugs that reduce fever.           </option>
<option value="    Antivirals:    ">    Antivirals:            </option>
<option value="  Beta-Blockers:    ">   Beta-Blockers:         </option>
<option value="     Bronchodilators:     ">            Bronchodilators:      </option>
<option value="    Cold Cures:      ">   Cold Cures:               </option>
<option value="    Corticosteroids:       ">        Corticosteroids:           </option>
<option value="   Cough Suppressants:        ">   Cough Suppressants:                </option>
<option value="   Cytotoxics:        ">           Cytotoxics:        </option>
<option value="   Decongestants:        ">  Decongestants:                 </option>
<option value="   Diuretics:        "> Diuretics:                  </option>
<option value="    Expectorant:       ">      Expectorant:             </option>
<option value="  Hormones:        ">   Hormones:               </option>
<option value="   Hypoglycemics (Oral)       ">   Hypoglycemics (Oral)               </option>
<option value="       Immunosuppressives:    ">      Immunosuppressives:             </option>
<option value="      Laxatives:     ">         Laxatives:          </option>
<option value="       Muscle Relaxants:   ">          Muscle Relaxants:        </option>
<option value="     Sedatives: Same as Antianxiety drugs.     ">    Sedatives: Same as Antianxiety drugs.    </option>
<option value="     Sex Hormones (Female):      ">      Sex Hormones (Female):             </option> 
<option value="   Sex Hormones (Male):        ">    Sex Hormones (Male):                </option> 
<option value="     Sleeping Drugs:       ">     Sleeping Drugs:               </option> 
<option value="    Tranquilizer:       ">   Tranquilizer:                </option> 
<option value="     Vitamins:      ">     Vitamins:              </option> 
</select>
</td>
</tr>
<div>

<br>

<tr>
<td> Dosage Form :
</td>
<td>
<select name="sp_make"  required/>
<option selected hidden value=""> Select Dosage Form </option>
<option value="   Tablet   "> Tablet    </option>
<option value="   Oral suspension   "> Oral suspension     </option>
<option value="   Chewable Tablet   ">  Chewable Tablet     </option>
<option value="  Capsule    "> Capsule    </option>
<option value=" Capsule, hard     ">  Capsule, hard    </option>
<option value="   Liquid   ">     Liquid    </option>
<option value="   Film- coated Tablet   ">  Film- coated Tablet    </option>
<option value="   Oral Solution   ">   Oral Solution     </option>
<option value="   Powder for oral Solution   ">  Powder for oral Solution    </option>
<option value="   Capsule   ">    Capsule   </option>
<option value="    Syrup  ">     Syrup   </option>
<option value="    Cream  ">  Cream     </option>
<option value="     Cataneous Spary Solution ">  Cataneous Spary Solution   </option>
<option value="  Lozenge    ">    Lozenge   </option>
<option value="   Medicated chewing-gum    ">  Medicated chewing-gum    </option>
<option value="  inhalation cartridge
for oromucosal use
    ">   inhalation cartridge
for oromucosal use  </option>
<option value="   Transdermal patch    "> Transdermal patch    </option>
<option value=" Oromucosal spray,
solution     ">   Oromucosal spray,
solution  </option>
<option value="   Compressed
lozenge
   ">   Compressed
lozenge  </option>
<option value="    Inhalation vapour,
liquid
  ">  Inhalation vapour,
liquid  </option>
<option value=" Nasal stick      "> Nasal stick       </option>
<option value="  Gargle/mouthwash     ">  Gargle/mouthwash    </option>
<option value="Soluble tablet       "> Soluble tablet      </option>
<option value=" Effervescent granules ">   Effervescent granules  </option>
<option value="   Capsule, soft    ">  Capsule, soft     </option>
<option value=" Effervescent tablet     ">  Effervescent tablet    </option>
<option value="   Cutaneous powder   "> Cutaneous powder    </option>
<option value="    Chewable tablet Cutaneous powder  ">   Chewable tablet Cutaneous powder   </option>
<option value="   Cutaneous powder   ">  Cutaneous powder   </option>
<option value="  Concentrate for
cutaneous solution    "> Concentrate for
cutaneous solution    </option>
<option value="  Cutaneous spray,
solution
    ">    Cutaneous spray,
solution </option>
<option value="   Powder and solvent
for prolongedrelease suspension
for injection
   ">    Powder and solvent
for prolongedrelease suspension
for injection
 </option>
<option value="Oral gel       ">  Oral gel    </option>
<option value=" Granules      ">    Granules  </option>
<option value="    Ointment  ">  Ointment   </option>
<option value="   Granules   ">    Granules </option>
<option value="     Inhalation vapour, ointment ">   Inhalation vapour, ointment </option>
<option value="   Nasal stick Nasal stick     "> Nasal stick          </option>
<option value=" Gastro-resistant tablet"> Gastro-resistant tablet </option>
<option value="   Oral drops, solution    "> Oral drops, solution      </option>
</select>
</td>
</tr>
<div>
<br>
<tr>
 <td> 
 Generic Name : 
</td>
<td> 
<input type="text"pLaceholder="Generic-Name" class="from-control" id="sp_name" name="sp_name"  required/>
</td>
</tr></div>
<div>

<br>
<tr><tr>
<td> Brand Name : 
</td>
<td> 
<input type="text"pLaceholder="Brand Name" class="from-control" id="type" name="type"  required/>
</td>
</tr>
<div>
 <td> 
  <br>
<tr><tr>
<td>MFG. Date: 
</td>
<td> 
<input type="text"pLaceholder="Manufacturing date" class="from-control" id="mfgdate" name="mfgdate"  required/>
</td>
</tr></div>
<div>
 <td> 
  <br>
<tr><tr>
<td>EXP. Date: 
</td>
<td> 
<input type="text"pLaceholder="Expiry Date" class="from-control" id="exdate" name="exdate"  required/>
</td>
</tr></div>
 <td> 
  <br>
<tr><tr>
<td> Quntity : 
</td>
<td> 
<input type="text"pLaceholder="Quntity" class="from-control" id="quntity" name="quntity"  required/>
</td>
</tr>
 <td> 
</tr></div>
<div><br>
<tr>
 <td> 
Price : 
</td>
<td> 
<input type="text"pLaceholder="Price" class="from-control" id="sp_price" name="sp_price"  required/>
</td>
</tr></div>
<div>
	<tr>
    <div>
    	<br>
      <button type="submit" name="upload">POST</button>
    </div>
</tr>
  </form>
</div>
</body>
</html>
   

