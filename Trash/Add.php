<form>
    <div class="field"  id=Project-id>
    <!-- //Requete SQL -> tableaux déroulant des project ID de la table Project -->
        <h2> Project ID </h2>
        <input type="text" class="field-add" id="field-projID" name="Project">
    </div>


    <div class="field"  id=Plane>
    <!--//Fenétre du choix de l'avion -->
        <h2> Plane </h2>
        <input type="text" class="field-add" id="field-plane"  name="plane"> 
    </div>

    <div class="field"  id=Country>
    <!-- //Fenétre du choix du pay -->
        <h2> Country </h2>
        <select name="country" class="field-add" id="field-country">
            <option value="Austria">Austria</option>
            <option value="Germany">Germany</option>
            <option value="Belgium">Belgium</option>
            <option value="France">France</option>
        </select>
    </div>

    <div class="field"  id=Mission-date>
        <!--
        //Requete SQL -> tableaux déroulant des dates disponible de la table mission flight
        //En lien avec le project ID selectionné
        // ET / OU BIEN : Calendar Menu -->
        <h2> Mission date </h2>
        <input type="date" class="field-add" id="field-date" name="date"
                value="2021-01-01"
                min="2018-01-01" max="2024-12-31">
    </div>

    <div class="field"  id=Disk-Number>
        <!-- //Champ à remplir par l'utilisateur comportant le numéro du disk sur lequel est stocké la donnée -->
        <h2> N° Disk </h2>
        <input type="text" class="field-add" id="field-Disk" name="disk">
    </div>


    <div class="field" id=Data-type>
    <!-- //Deux choix -> Images et Orthos
    //Images -> LV0 / LV1 / LV2 / RAW
    //Images.LV2 -> RGB / CIR / PAN / RGBI -->
        <h2> Data Type </h2>
        <ul class="tabsDT">
            <li class="active"><a href="#Image">Image</a></li>
            <li><a href="#Ortho">Orthophoto</a></li>
            <li><a href="#Lidar">Lidar</a></li>
        </ul>
    

        <div class="tabsDT-content_data-type">
            <div class="tabDT-content active" id="Image">

                <div class="field"  id=Range>
                <!-- //Deux champs ou l'utilisateur doit remplir la premiére et derniére image acquise -->
                    <h2> Image Start </h2>
                    <input type="text" class="field-add" id="field-imgStart" name="disk">
                    <h2> Image End </h2>
                    <input type="text" class="field-add" id="field-imgEnd" name="Iend">
                </div>

                <div class="field" id=Shape>
                <!-- //Chargement du shape -> Liens de l'éléments ? -> glissé déposé-->
                    <h2> Polygone shape </h2>
                    <input type="file" class="field-add" id="field-Shp" name="shp">
                </div>
                
                <div>
                    <input type="checkbox" name="DT-img" class="DT-img img_R" id="img_R" checked>
                    <label for="img_R">RAW</label>
                    <input type="checkbox" name="DT-img" class="DT-img img_0" id="img_0" >
                    <label for="img_0">LV0</label>
                    <input type="checkbox" name="DT-img" class="DT-img img_2" id="img_2">  
                    <label for="img_2">LV2</label>
                    <input type="checkbox" name="DT-img" class="DT-img img_3" id="img_3">  
                    <label for="img_3">LV3</label>

                </div>
            </div>
                    
            <div class="tabDT-content" id="Ortho">
                <div>
                    <input type="checkbox" name="DT-img" class="DT-img C-Ortho" id="C-Ortho" >
                    <label for="C-Ortho">Ortho</label>
                </div>
            </div>

            <div class="tabDT-content" id="Lidar">
                <div>
                    <input type="checkbox">
                    <span class="slider round"></span>
                </div>
            </div>
        </div>
    </div>

    <script defer src="tabs_DT.js"></script>

    <input type="reset" value="Reset">
    <input type="submit" value="Submit">
</form>