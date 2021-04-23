<div class="field"  id=Search-BDL>
<!-- //Requete SQL -> tableaux déroulant des project ID de la table Project -->
    <h2> BDL (Project ID) </h2>
    <input type="text" list="Search_Bdl" class="search-field" name="Search_Bdl" id="Search_pjID">
    <span id="bdlName"></span>
    <datalist id="Search_Bdl">
    <?php   
        foreach ($BDL as $B) {
            echo "<option value=" . $B["bdl"] . ">";
        }
    ?>
    </datalist>
</div>



<div id=Search-id><p>
<?php //Fenétre du choix du pay
echo "chercher par l'id";
?>
</p></div>

<div id=Search-Result><p>
</p></div>