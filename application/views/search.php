<!DOCTYPE HTML SYSTEM>
<?php include('baseurl.php'); ?>
<html>
    <head>
        <?php include('header.php'); ?>
    </head>
    <body>
        <?php $id1 = 'search'; ?>
        <?php include('body.php'); ?>
        <?php include('menu.php'); ?>
        <div id="article">
            <h2>Search collections</h2>
            <fieldset class="advancedSearch">
                <legend class="hideText">Advanced search</legend>
                <form action="<?php echo $baseUrl . 'index.php/search/search' . $db_type . '/find' ?>" id="search-form" method="get" name="search">
                    <p class="searchError">One or more check boxes must be ticked within the <span class="group"></span> group<span class="plural"></span>.<br />Tick at least one checkbox <span class="moreThanOne"></span> and click search again.</p>
                    <div class="twoCol a">
                        <!-- Keyword box -->
                        <div class="box">
                            <h3 class="boxedTitle">Keyword search<a class="furtherinfo" href="#" title="About this search term">More information</a></h3>
                            <p class="shuntRight"></p>
                            <p class="furtherinfoText">You can search any object by its name, accession number or any other related keyword(s).</p>
                            <label for="keywordSearch" class="hideText">Keyword search</label>
							<div id="searchbox1">
							<input type="text" class="textBox" value="" id="keywords-input" name="keywords" />
							</div>
							<div id="searchbox2">
							<input type="submit" value="&#8594;" class="go" id="searcharrow"/>
							</div>
                        </div>
                        <!-- Object type box -->
                        <div class="box">
                            <h3 class="boxedTitle">Object type</h3>
                            <p class="shuntRight"><a href="#" class="n_all">Tick all</a> | <a href="#" class="n_none">Tick none</a></p>
                            <ul class="checkboxList  required">
                                <div class="twoCol a">
                                    <li>
                                        <input checked="checked" id="o1" name ="o0" value="ObjectType[body adornment,jewellery]" type="checkbox"/>
					<label for="o1">Body adornment, jewellery </label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o2" name ="o1" value="ObjectType[containers, vessels]" type="checkbox" />
                                        <label for="o2">Containers, vessels</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o3" name ="o2" value="ObjectType[costume, dress]" type="checkbox" />
                                        <label for="o3">Costume, dress</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o4" name ="o3" value="ObjectType[currency]" type="checkbox" />
                                        <label for="o4">Currency</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o5" name ="o4" value="ObjectType[domestic equipment]" type="checkbox" />
                                        <label for="o5">Domestic equipment</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o6" name ="o5" value="ObjectType[figures, sculture]" type="checkbox" />
                                        <label for="o6">Figures, sculpture</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o7" name ="o6" value="ObjectType[games, toys, models]" type="checkbox" />
                                        <label for="o7">Games, toys, models</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o8" name ="o7" value="ObjectType[hunting, fishing]" type="checkbox" />
                                        <label for="o8">Hunting, fishing</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o9" name ="o8" value="ObjectType[ivories]" type="checkbox" />
                                        <label for="o9">Ivories</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o10" name ="o9" value="ObjectType[masks, headdresses]" type="checkbox" />
                                        <label for="o10">Masks, headdresses</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o11" name ="o10" value="ObjectType[musical instruments]" type="checkbox" />
                                        <label for="o11">Musical instruments</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o12" name ="o11" value="ObjectType[photograph]" type="checkbox" />
                                        <label for="o12">Photographs</label>
                                    </li>
                                </div>
                                <div class="twoCol b">
                                    <li>
                                        <input checked="checked" id="o13" name ="o12" value="ObjectType[production equipment]" type="checkbox" />
                                        <label for="o13">Production equipment</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o14" name ="o13" value="ObjectType[regalia]" type="checkbox" />
                                        <label for="o14">Regalia</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o15" name ="o14" value="ObjectType[religious equipment, ritual equipment, charms]" type="checkbox" />
                                        <label for="o15">Religious/ritual equipment, charms</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o20" name ="o19" value="ObjectType[wax cylinder recordings]" type="checkbox" />
                                        <label for="o20">Sound Recordings</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o16" name ="o15" value="ObjectType[textiles, cloth]" type="checkbox" />
                                        <label for="o16">Textiles, cloth</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o17" name ="o16" value="ObjectType[Toilet equipment, cosmetic equipment]" type="checkbox" />
                                        <label for="o17">Toilet/cosmetic equipment</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o18" name ="o17" value="ObjectType[tools, implements]" type="checkbox" />
                                        <label for="o18">Tools, implements</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o19" name ="o18" value="ObjectType[transport]" type="checkbox" />
                                        <label for="o19">Transport</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o21" name ="o20" value="ObjectType[weapons, armour]" type="checkbox" />
                                        <label for="o21">Weapons, armour</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="o22" name ="o21" value="ObjectType[Unknown]" type="checkbox" />
                                        <label for="o22">Unknown</label>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="twoCol b">
                        <!-- Materials box -->
                        <div class="box">
                            <h3 class="boxedTitle">Materials</h3>
                            <p class="shuntRight"><a href="#" class="n_all">Tick all</a> | <a href="#" class="n_none">Tick none</a></p>
                            <ul class="checkboxList required">
                                <div class="twoCol a">
                                    <li>
                                        <input checked="checked" name="m0" id = "m1" value="Materials[bone, ivory, tooth]" type="checkbox" />
                                        <label for="m1">Bone, ivory, tooth</label>
                                    </li>
                                    <li>
                                        <input checked="checked" name="m1" id = "m2" value="Materials[ceramic]" type="checkbox" />
                                        <label for="m2">Ceramic</label>
                                    </li>
                                    <li>
                                        <input checked="checked" name="m2" id = "m3" value="Materials[feather, fur, hair, horn]" type="checkbox" />
                                        <label for="m3">Feather, fur, hair, horn</label>
                                    </li>
                                    <li>
                                        <input checked="checked" name="m3" id = "m4"  value="Materials[glass]" type="checkbox" />
                                        <label for="m4">Glass</label>
                                    </li>
                                    <li>
                                        <input checked="checked" name="m4" id = "m5" value="Materials[leather, animal skin]" type="checkbox" />
                                        <label for="m5">Leather, animal skin</label>
                                    </li>
                                    <li>
                                        <input checked="checked" name="m5" id = "m6"  value="Materials[metal]" type="checkbox" />
                                        <label for="m6">Metal</label>
                                    </li>
                                    <li>
                                        <input checked="checked" name="m6" id = "m7" value="Materials[paper]" type="checkbox" />
                                        <label for="m7">Paper</label>
                                    </li>
                                </div>
                                <div class="twoCol b">
                                    <li>
                                        <input checked="checked" name="m7" id = "m8" value="Materials[shell]" type="checkbox" />
                                        <label for="m8">Shell</label>
                                    </li>
                                    <li>
                                        <input checked="checked" name="m8" id="m9"  value="Materials[stone]" type="checkbox" />
                                        <label for="m9">Stone</label>
                                    </li>
                                    <li>
                                        <input checked="checked" name="m9" id = "m10"  value="Materials[textile]" type="checkbox" />
                                        <label for="m10">Textile</label>
                                    </li>
                                    <li>
                                        <input checked="checked" name="m10" id = "m11"  value="Materials[vegetable, organic fiber]" type="checkbox" />
                                        <label for="m11">Vegetable, organic fiber</label>
                                    </li>
                                    <li>
                                        <input checked="checked" name="m11" id = "m12" value="Materials[wood]" type="checkbox" />
                                        <label for="m12">Wood</label>
                                    </li>
                                    <li>
                                        <input checked="checked" name="m12" id = "m13" value="Materials[Unknown]" type="checkbox" />
                                        <label for="m13">Unknown</label>
                                    </li>
                                </div>
                            </ul>
                        </div>
                        
                        <!-- Museums box -->
                        <div class="box">
                            <h3 class="boxedTitle">Collections<a class="furtherinfo" href="#" title="About this search term">More information</a></h3>
                            <p class="shuntRight">| <a href="#" class="n_all">Tick all</a> | <a href="#" class="n_none">Tick none</a></p>
                            <p class="furtherinfoText">This resource currently provides access to Sierra Leonean collections in the Sierra Leone National Museum, Brighton Museum & Art Gallery, the British Library Sound Archive, the British Museum, Glasgow Museums and the World Museum Liverpool. It is hoped that other collections will be added in the future.</p>
                            <ul class="checkboxList required">
                                <div class="twoCol a">
                                    <li>
                                        <input checked="checked" id="I1"  name="i0" type="checkbox" value="Museum[Sierra Leone National Museum]" />
                                        <label for="I1">Sierra Leone National Museum</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="I2" name="i1"  type="checkbox" value="Museum[Brighton Museum]"/>
                                        <label for="I2">Brighton Museum &amp; Art Gallery</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="I3" name="i2" type="checkbox" value="Museum[British Museum]"/>
                                        <label for="I3">British Museum</label>
                                    </li>
                                </div>
                                <div class="twoCol b">
                                    <li>
                                        <input checked="checked" id="I4" name="i3" type="checkbox" value="Museum[Glasgow Museum]"/>
                                        <label for="I4">Glasgow Museums</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="I5" type="checkbox" name="i4" type="checkbox" value="Museum[World Museum Liverpool]"/>
                                        <label for="I5">World Museum Liverpool</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="I6" type="checkbox" name="i5" type="checkbox" value="Museum[British Library]" />
                                        <label for="I6">British Library Sound Archive</label>
                                    </li>
                                    <li>
                                        <input checked="checked" id="I7" type="checkbox" name="i7" type="checkbox" value="Museum[Cootje van Oven Collection]" />
                                        <label for="I7">Cootje van Oven Collection</label>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Culture group box -->
                    <div class="box clearBoth">
                        <h3 class="boxedTitle">Culture group <a class="furtherinfo" href="#" title="About this search term">More information</a></h3>
                        <p class="shuntRight">| <a href="#" class="all">Tick all</a> | <a href="#" class="none">Tick none</a></p>
                        <p class="furtherinfoText">We acknowledge that assigning objects to specific 'ethno-linguistic' or 'tribal' groups is highly problematic and does not reflect the dynamic and complex nature of cultural identity in Sierra Leone. In some cases, particular types of objects or styles of carving are associated with specific groups and regions. In many cases, however, the ethnic classification of objects is inappropriate and this data, where recorded, should be regarded with caution.</p>
                        <p class="shuntRight">
                            <div class="banner map" syle="right: 0px; top: 0px; height: 500px; width:500px; position: absolute">
                                <img src="<?php echo $assetsUrl; ?>images/ethnicityMap.png" alt="" />
                                <ul class="cultureGroups">
                                    <li class="gola"><a href="#">Gola</a></li>
                                    <li class="kisi"><a href="#">Kisi</a></li>
                                    <li class="kono"><a href="#">Kono</a></li>
                                    <li class="krim"><a href="#">Krim</a></li>
                                    <li class="krio"><a href="#">Krio</a></li>
                                    <li class="kuranko"><a href="#">Kuranko</a></li>
                                    <li class="limba"><a href="#">Limba</a></li>
                                    <li class="loko"><a href="#">Loko</a></li>
                                    <li class="mende"><a href="#">Mende</a></li>
                                    <li class="sherbro"><a href="#">Sherbro</a></li>
                                    <li class="soso"><a href="#">Soso</a></li>
                                    <li class="temne"><a href="#">Temne</a></li>
                                    <li class="vai"><a href="#">Vai</a></li>
                                    <li class="yalunka"><a href="#">Yalunka</a></li>
                                </ul>
                            </div>
                        </p>
                        <ul class="checkboxList mapCheckboxes required">
                            <div class="twoCol a">
                                <li>
                                    <input checked="checked" name="c0" id="bullom" value="CultureGroup[bullom]" type="checkbox" />
                                    <label for="bullom" class="bullom">Bullom</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c1" id="fula"  value="CultureGroup[fula]" type="checkbox" />
                                    <label for="fula" class="fula">Fula</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c2" id="gola" value="CultureGroup[gola]" type="checkbox" />
                                    <label for="gola" class="gola">Gola</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c3" id="kisi" value="CultureGroup[kisi]" type="checkbox" />
                                    <label for="kisi" class="kisi">Kisi</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c4" id="kono" value="CultureGroup[kono]" type="checkbox" />
                                    <label for="kono" class="kono">Kono</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c5" id="krim"  value="CultureGroup[krim]" type="checkbox" />
                                    <label for="krim" class="krim">Krim</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c6"  id="krio" value="CultureGroup[krio]" type="checkbox" />
                                    <label for="krio" class="krio">Krio</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c7"  id="kuranko"  value="CultureGroup[kuranko]" type="checkbox" />
                                    <label for="kuranko" class="kuranko">Kuranko</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c8" id="limba" value="CultureGroup[limba]" type="checkbox" />
                                    <label for="limba" class="limba">Limba</label>
                                </li>
                            </div>
                            <div class="twoCol b">
                                <li>
                                    <input checked="checked" name="c9" id="loko" value="CultureGroup[loko]" type="checkbox" />
                                    <label for="loko" class="loko">Loko</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c10" id="mandingo" value="CultureGroup[mandingo]" type="checkbox" />
                                    <label for="mandingo" class="mandingo">Mandingo</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c11"  id="mende" value="CultureGroup[mende]" type="checkbox" />
                                    <label for="mende" class="mende">Mende</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c12"  id="sherbro"  value="CultureGroup[sherbro]" type="checkbox" />
                                    <label for="sherbro" class="sherbo">Sherbro</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c13"  id="soso" value="CultureGroup[soso]" type="checkbox" />
                                    <label for="soso" class="soso">Soso</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c14" id="temne"  value="CultureGroup[temne]" type="checkbox" />
                                    <label for="temne" class="temne">Temne</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c15" id="vai" value="CultureGroup[vai]" type="checkbox" />
                                    <label for="vai" class="vai">Vai</label>
                                </li>
                                <li>
                                    <input checked="checked" name="c16" id="yalunka" value="CultureGroup[yalunka]" type="checkbox" />
                                    <label for="yalunka" class="yalunka">Yalunka</label>
                                </li>
                                <li>
                                    <input checked="checked" id="c18" name="c17" type="checkbox" value="CultureGroup[Unknown]"/>
                                    <label for="No Data">Other</label>
                                </li>
                            </div>
                        </ul>
                    </div>
                    <p class="searchError">One or more check boxes must be ticked within the <span class="group"></span> group<span class="plural"></span>.<br />Tick at least one checkbox <span class="moreThanOne"></span> and click search again.</p>
                    <center><input type="submit" value="Search &#8594;" class="go"/></center>
                </form>
            </fieldset>
        </div>
        <?php include($documentRoot.'/footer.php'); ?>
    </body>
</html>