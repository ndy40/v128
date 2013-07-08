<!DOCTYPE HTML SYSTEM>
<?php include('../baseurl.php'); ?>

<html>
    <head>
        <?php include ('../header.php'); 
		error_reporting(0);
		
		?>

    </head>
    
    <body>
        <?php $id1 = 'glossary'; ?>
        <?php include('../body.php'); ?>
        <?php include('../menu.php'); ?>
        
        <div id="article" class="glossary">
            <?php
                switch($_GET['id']) {
                    case 'alldridge-t-j';
                        echo '<h2>Alldridge T.J.</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>From the 1870s commercial agent for a trading company based on Bonthe, Sherbro island, and latterly (in the 1890s) travelling commissioner for the British Government whose role was to persuade Mende chiefs in the interior of south-eastern Sierra Leone to sign treaties with the British authorities, thus paving the way for the setting up of the Sierra Leone Protectorate. He was the author of <em>The Sherbro and its Hinterland</em>, published 1901, an account of his activities as travelling commissioner and a pioneering and influential description of the institutions and way of life of the Bullom and Mende peoples. An avid collector of the material culture of the indigenous groups with whom he was in contact, he sold part of his substantial collections to the British Museum and to Brighton Art Gallery and Museum and the remainder on the open market.</p>
                        <ul>
                                <li>T.J.Alldridge, <em>The Sherbro and its Hinterland</em> (London 1901)</li>
                                <li>T.J.Alldridge, <em>A Transformed Colony</em> (London 1910)</li>
                                <li>C.P.Foray, Historical Dictionary of Sierra Leone (New Jersey 1977) [Has an entry for Alldridge.]</li>
                        </ul>';
                        break;
                    case 'balangi':
                        echo '<h2>Balangi</h2>
                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>Xylophone-like musical instrument consisting of a series of wooden tone bars or keys attached to a wooden frame with small gourd resonators underneath. Played with two beaters. It is particularly associated with the Kuranko and other ethno-linguistic groups of Mande origin in northern Sierra Leone.</p>
                        <ul>
                                <li>C.van Oven, <em>An Introduction to the Music of Sierra Leone</em> (Private publication 1981)</li>
                        </ul>
                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Balafon"> </iframe>
                        </div>';
                        break;
                    case 'bangeon':
                        echo '<h2>Bangeon</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>Musical instrument. Name quoted in the 18th century for a particular Sierra Leone variant of the west African bow-and-bridge harp in which the soundbox is carved from a single piece of wood in a boat-shape with projecting figurehead; the bow of the instrument being bound to the latter with twine. The top of the soundbox is covered with animal skin and supports a wooden bridge with between five and ten strings. A simpler modern version of the instrument called the kondene in Yalunka has a calabash or metal bowl as soundbox. Among the Yalunka and Kuranko it is played by praise-singers for hunters.</p>
                        <ul>
                                <li>W.A.Hart, &#39Two early west African harps in Glasgow&#39, <em>Journal of the History of Collections</em>, 1994, 6, 1, 79-85. </li>
                                <li>[There is an illustration of such an instrument in the second edition of J.Matthews, A Voyage to the River Sierra Leone (London 1792.]</li>
                        </ul>';
                        break;
                    case 'ka-bari':
                        echo '<h2>Ka-Bari (pl. Ta-Bari)</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>Temne word for &#39twin&#39. Also refers to small wooden figures carved to represent twins. Twins are believed by the Temne to possess special spiritual powers that can become injurious to those about them if they are not treated with proper consideration. In the event of the death of a twin, therefore, the mother will often have a twin figure carved to represent the twin who has died and, whenever the live twin is washed or adorned or fed, the twin figure is also washed adorned and fed, so that the dead twin will not be jealous and take out its resentment against its twin or family.</p>
                        <ul>
                                <li>N.W.Thomas, <em>Anthropological Report on Sierra Leone</em> (London 1916), 112-114.</li>
                                <li>F.J.Lamp,&#39Temne twins (ta-bari) should share everything&#39, <em>African Arts</em>, 2008, 41, 1, 50-65.</li>
                        </ul>';
                        break;
                    case 'ka-bemba':
                        echo '<h2>Ka-Bemba [the grandfather]</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>Name given by the Temne to the masked figure who leads male initiands from the village to the bush for their initiation and brings them back to the village at the conclusion of the initiation. By extension the name is also applied to the mask he wears. Ka-Bemba masks vary a great deal, but often have a prominent or overhanging forehead above a straight nose, the eyes and mouth holes being pierced through the flat plane of the face. The surface of the mask is sometimes daubed with paint, giving it a mottled appearance. Some ka-Bemba masks are horned and some are adorned with metal, often brass, strip ornament. The mask is worn with undyed raffia.</p>
                        <ul>
                                <li>F.J.Lamp, &#39Frogs into princes: the Temne Rabai initiation&#39, <em>African Arts</em>, 1978, XI, 2, 38-49.</li>
                        </ul>';
                        break;
                    case 'am-boro-ma-sar':
                        echo '<h2>Am-Boro Ma-Sar [the house of stones]</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>Small shrine or pavilion in a village in which a number of fist-sized stones are kept that represent deceased prominent members of the community. Offerings are  made, libations are poured and prayers made to the ancestors of the community at this shrine.</p>
                        <ul>
                                <li>F.J.Lamp, &#39House of stones: memorial art of fifteenth-century Sierra Leone&#39, <em>The Art Bulletin</em>, 1983, 65/2, 219-237. [Gives a good description of <em>am-boro ma-sar</em> which is quite separate from his controversial main thesis, that the Temne were responsible for the ancient stone sculptures called nomoli that are found buried in the soil in south-eastern Sierra Leone.]</li>
                        </ul>';
                        break;
                    case 'bondo':
                        echo '<h2>Bondo</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>Temne and Bullom name for a women&#39s society that exists to prepare and educate girls for their responsibilities and tasks as adult women. Its Mende equivalent is Sande. In the past all girls approaching puberty were initiated into Bondo and had to spend a lengthy period, perhaps even several years, separated from their families in seclusion in the society &#39bush&#39, a clearing in the forest near the village, under the guidance of mature women who acted as their instructors and models. Today the period of initiation is often drastically reduced to a few weeks to fit in with school holidays. The return of the initiates to the village at the close of their initiation is an occasion for public rejoicing and family pride. Clitorodectomy, in at least some modified form, forms an essential part of the Bondo (or Sande) initiation. Bondo is not a centralised institution, but takes the form of numerous more or less independent local lodges with common practices and traditions. In Temne Bondo higher-ranking members are known as digba. The most striking public manifestation of Bondo is the mask called <a href="<?php echo $baseUrl; ?>/glossary/n/a-nowo/"><em>a-Nowo</em></a>, a black-dyed wooden helmet mask worn with a costume of black raffia and cloth. [Among the Mende the mask is known as sowei and the masker as the ndoli jowei or &#39dancing sowei&#39.] The mask is an idealised image of female beauty and dignity.</p>
                        <ul>
                                <li>F.J.Lamp, &#39Cosmos, cosmetics and the spirit of Bondo&#39, <em>African Arts</em>, 1985, 18/3, 28-43. [One of the few accounts to focus on the Temne version of the women&#39s society.]</li>
                                <li>S.A.Boone, <em>Radiance from the Waters</em> (New Haven/London 1986)</li>
                                <li>R.B.Phillips, <em>Representing Woman</em> (Los Angeles 1995)</li>
                                <li>[Both Boone and Phillips deal with the Mende Sande society.]</li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Sande_society"> </iframe>
                        </div>';
                        break;
                    case 'bullom':
                        echo '	<h2>Bullom</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>The Bullom are an ethno-linguistic group that formerly occupied most of the coastal areas of Sierra Leone from the Bullom shore, north of  the Sierra Leone River, to near the border with Liberia in the south-east. They have no traditions of migration and have therefore some claim to be considered the original inhabitants of the country and the producers of its oldest artefacts, the ancient stone sculptures that are found buried in the soil (refer to <a href="<?php echo $baseUrl; ?>/glossary/n/nomoli/">nomoli</a>). Today, north of the Sierra Leone River, the Bullom  language has largely been displaced by Temne. South of the river it survives mainly in the coastal chiefdoms adjacent to Sherbro Island and on Sherbro Island itself, and for that reason the southern Bullom are often referred to colloquially as Sherbro. Even in the south, however, the number of Bullom speakers (and speakers of Krim, its almost extinct relative) continues to shrink year by year as the Mende language expands its cultural and linguistic dominance in the area.</p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Bullom_languages"> </iframe>
                        </div>';
                        break;
                    case 'bundu':
                        echo '<h2>Bundu</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>Krio version of the name of the women&#39s society called Bondo in Temne and Bullom or Sande in Mende. Also, confusingly, sometimes applied to Limba boys (so-called &#39Bundu boys&#39) at the time of their initiation into adulthood, perhaps because the central ceremony of that initiation is called <em>Bondokali</em> or <em>Gbondokali</em>.</p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Sande_society"> </iframe>
                        </div>';
                        break;
                    case 'butu':
                        echo '<h2>Butu</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>A masked spirit of  the RaGbenle society in Gbonkolenken chiefdom, Tokolili District, central Sierra Leone. The masker wears leggings and upper body shirt of undyed raffia and a wooden mask, painted black with white spots, with a short hollow tube or snout. He is said to snatch up objects as he moves about the village and keep them for himself. He is paired with <em>Namankera</em> (refer to <a href="<?php echo $baseUrl; ?>/glossary/n/namankera/"><em>Namankera</em></a>) who reputedly acts as his spokesman in any court case brought against him.</p>';
                        break;
                    case 'country-cloth':
                        echo '<h2>Country Cloth</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>Name given in Sierra Leone to cloth made from locally grown cotton, carded and spun into thread, and woven into strips on traditional looms. The strips are then sewn together edge to edge to form the finished cloth. The simpler types of country cloth are plain or warp-striped, using threads of natural brown cotton or threads dyed different shades of blue or green using traditional dyes. More elaborately conceived cloths called <em>kpokpo</em> (q.v.) are made by sewing together strips with variations in the weft that combine to form a complex pattern across the cloth as a whole. In the past possession of such cloths was regarded as a sign of wealth and prestige and they even functioned as a kind of currency. Country cloth is made up into shirts and gowns and headgear, particularly clothing associated with traditional ceremonies, such as the ritual gown of a Temne paramount chief or the gowns worn by boys at the completion of their initiation. Country cloth was used in hammocks and also in wrapping the dead for burial. Country cloth weaving was the centrepiece of Sierra Leone&#39s contribution to the 1924 British Empire Exhibition at Wembley (refer to <a href="<?php echo $baseUrl; ?>/sites/easmon/">Easmon</a>) and three traditional weavers were present throughout demonstrating their skills.</p>
                        <ul>
                                <li>M.C.F.Easmon, <em>Sierra Leone Country Cloths</em> (London 1924)</li>
                                <li>C.Magbaily Fyle & A.Abraham, &#39The country cloth culture in Sierra Leone&#39, Odu, 1976, 13.</li>
                                <li>V. & A. Lamb, <em>Sierra Leone Weaving</em> (Hertingfordbury  1984)</li>
                        </ul>';
                        break;
                    case 'devil':
                        echo '<h2>Devil</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>A Krio term derived from English that is often applied to the spirits of the different cult associations, particularly those that are represented in the various masquerades of those associations. Thus &#39Bondo [or Bundu] devil mask&#39 refers to the mask or masker that embodies the guardian spirit of the women&#39s Bondo society, and &#39dancing devils&#39 in general refers to traditional masqueraders. There is no implication in these contexts that the spirit represented is an &#39evil&#39 spirit.</p>';
                        break;
                    case 'falui':
                        echo '<h2>Falui</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>A secular or entertainment masker among the Mende. The masker wears a costume of country cloth and undyed raffia. The headpiece is cone-shaped, covered in red, black and white cloth decorated with mirrors and cowrie shells, crowned at the top with feathers. </p>
                        <ul>
                                <li>W.Siegmann & J.Perani, &#39Men&#39s masquerades of Sierra Leone and Liberia&#39, <em>Ethnologische Zeitschrift Z�rich</em>, 1980, 1, 25-40. [Illustration 8]</li>
                                <li>R.B.Phillips, <em>Representing Woman</em> (Los Angeles 1995), Ch.3.</li>
                        </ul>';
                        break;
                    case 'fanner':
                        echo '<h2>Fanner</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>Refer to <a href="<?php echo $baseUrl; ?>/glossary/r/rice-fanner/">Rice fanner</a>.</p>';
                        break;
                    case 'fetish':
                        echo '<h2>Fetish</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>

                        <p>A term in English derived originally from feiti�o the Portuguese word for &#39witchcraft&#39 via the west African coast or pidgin English of the 17th and 18th centuries. By the 19th century it had come to be applied to particular assemblages of material objects or substances thought by Africans to be imbued with spiritual power. By extension, it was also used by Europeans as a catch-all term to categorise any object, for example a mask or figure sculpture, that was seen as carrying spiritual or religious significance for members of the indigenous population.</p>
                        <ul>
                                <li>W.Pietz, &#39The problem of the fetish&#39 in <em>RES</em>, 1985, 9, 5-17 and subsequent volumes.</li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Fetishism"> </iframe>
                        </div>';
                        break;
                    case 'fula':
                        echo '<h2>Fula</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	

                        <p>An ethno-linguistic group best known in Sierra Leone as cattle herders and traders. In the 18th century they formed a powerful Muslim state centred on Futa Jallon (in what is now the Republic of Guinea) with which the infant Colony of Sierra Leone made repeated attempts to establish trading relations. They form part of the larger Peul/Fula/Fulani linguistic and cultural group which extends  across the Sahel region of west Africa from Senegal in the west to Cameroon in the east. One of the chiefly families in the Temne chiefdom of Yoni is of Fula origin. From the 1830s, when Fula traders and craftsmen in metal and leather first established a presence in Freetown, there has been a Fula community in Freetown.</p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Fula_people_of_Sierra_Leone"> </iframe>
                        </div>';
                        break;
                    case 'gbangbani':
                        echo '<h2>Gbangbani</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A witch-fighting association among the Limba people of northern Sierra Leone. Its powers are often called upon to safeguard male initiands at the time of their initiation into manhood from the malignant spiritual forces to which they are believed to be particularly vulnerable. The instrument typically associated with Gbangbani in its fight against evil forces is a wooden trumpet or megaphone (<em>hu-yenki</em>) carved in the shape of a woman or with a woman&#39s figure astride it.</p>';
                        break;
                    case 'gbendekolo':
                        echo '<h3>Gbendekolo</h3>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A funeral masker among the Limba people of northern Sierra Leone. The mask is made of brass (<em>an-kem</em> in Limba) and typically consists of a square or oblong central panel on which the features of a face have been roughly beaten out; two roughly hemispherical brass flaps at each side for ears; and a triangular brass flap above and below the central panel. Attached to the upper flap is a sheaf of porcupine quills. Animal skins of different kinds hang from the mask, which is worn at the side of the head, on the shoulder, rather than over the face. A number of such maskers may appear at the funeral of a paramount chief and take it in turn to dance. They are said to dance around and through the hot embers of a fire without suffering injury.</p>
                        <ul>
                                <li>W.A.Hart, &#39Limba funeral masks&#39, <em>African Arts</em>, 1988, XXII, 1, 60-67.</li>
                        </ul>';
                        break;
                    case 'gbeni-gbini':
                        echo '<h2>Gbeni/Gbini</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Mende name for the chief masker associated with the men&#39s Poro society (q.v.). The masker wears a long cape of undyed raffia and raffia leggings. The headpiece is broad and cylindrical, flat on top, and is decorated with animal skin, cowrie shells and mirrors, with a small gap at the front allowing the masker to see out without being seen. From the collar of the headpiece a panel hangs down over the chest and midriff of the masker generally fronted with leopard skin and ornamented with cowrie shells. At the back a number of small wooden panels are suspended with sentences from the Qur&#39an written on them that knock together when the masker moves.</p>
                        <ul>
                                <li>T.J.Alldridge, <em>The Sherbro and its Hinterland</em> (London 1901), Ch.13.</li>
                                <li>W.Siegmann &amp; J.Perani, &#39Men&#39s masquerades of Sierra Leone and Liberia&#39, <em>Ethnologische Zeitschrift Z�rich</em>, 1980, 1, 25-40. [Illustrations 1 and 2]</li>
                        </ul>';
                        break;
                    case 'gbetu':
                        echo '<h2>Gbetu</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Gola name for a masker who wears a wooden headpiece consisting of a carved, usually ornamented, wooden base from which rises an elongated ringed neck and female head. Its Mende and Vai name is mbowei.</p>
                        <ul>
                                <li>W.Siegmann &amp; J.Perani, &#39Men&#39s masquerades of Sierra Leone and Liberia&#39, <em>Ethnologische Zeitschrift Z�rich</em>, 1980, 1, 25-40. [Illustration 10]</li>
                        </ul>';
                        break;
                    case 'goboi':
                        echo '<h2>Goboi</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Mende name for a masker associated with the men&#39s Poro society (q.v.). In appearance it is hard to distinguish from <em>Gbeni/Gbini</em> (q.v.) and it is not certain that it always represents a separate masquerade as opposed to being an alternative name for the same masquerade. Gittins (see below) describes it as the secular equivalernt of Gbeni.</p>
                        <ul>
                                <li>A.J.Gittins, <em>Mende Religion</em> (Nettetal 1987), 151.</li>
                        </ul>';
                        break;
                    case 'gola':
                        echo '<h2>Gola</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>An ethno-linguistic group on the Sierra Leone-Liberian border, neighbours of the Vai and the Mende with whom they share many institutions and cultural traditions. </p>
                        <ul>
                                <li>W.L.d&#39Azevedo, &#39Sources of Gola artistry&#39, in d&#39Azevedo, ed., <em>The Traditional Artist in African Society</em> (Bloomington 1973), 283-340</li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Gola_people"> </iframe>
                        </div>';
                        break;
                    case 'gonde':
                        echo '<h2>Gonde</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>An entertainment masker that appears together with the dignified <em>ndoli jowei</em> (q.v.) of the Sande society and offers a parody of the latter by its own dishevelled appearance and undignified behaviour. The mask is often an old <em>ndoli jowei</em> mask that is too decayed or damaged to be used for its original purpose and its Gonde character may be further emphasised by its being daubed with white paint. Unlike the <em>ndoli jowei</em>, little attempt is made to conceal the person wearing the mask.</p>';
                        break;
                    case 'halei':
                        echo '<h2>Halei</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A Mende term commonly translated as &#39medicine&#39. It refers to a source of spiritual power typically possessed by some indigenous association or cult group and may be physically embodied in some package or conglomeration of natural substances or objects kept in the association&#39s sacred house and brought out from time to time for special ceremonies.</p>
                        <ul>
                                <li>G.Innes, <em>A Mende-English Dictionary</em> (Cambridge 1969)</li>
                        </ul>';
                        break;
                    case 'hojo':
                        echo '<h2>Hojo</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Mende term for a paste of white clay and fat that was smeared as a protective medicine over the faces and bodies of girls about to go into the Sande bush to be initiated into the Sande society. T.J.Alldridge, whose transliteration of indigenous terms is not always reliable, refers to it as &#39wojeh&#39. It was typically made up in a carved wooden palette or shallow dish. Examples of such &#39palettes&#39 are to be found in a number of museum collections.</p>
                        <ul>
                                <li>G.Innes, <em>A Mende-English Dictionary</em> (Cambridge 1969) </li>
                        </ul>';
                        break;
                    case 'human-leopards':
                        echo '<h2>Human Leopards</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Name given to a criminal society whose members band together to commit murder to obtain human body parts, fat and blood for the creation of a medicine Borfima thought to imbue its possessors with supernatural powers guaranteeing success in their undertakings. It was alleged that the society members concealed themselves in leopard skins and used a special three pronged knife when killing their selected victims so that the deaths would be blamed on leopards. They were also said to practise cannibalism. There were repeated reports of human leopard activity in Sherbro and Mende chiefdoms in Bonthe district in the 1890s and 1900s, and the Colonial Government passed ordinances outlawing membership of this and similar societies (such as Human Alligator and Human Baboon societies) and set up special circuit courts to deal with offenders. A number of  individuals were subsequently tried and found guilty of being involved in human leopard murders, some of whom confessed to their crimes; but, as with witchcraft trials in Europe, it is not easy to separate the reality behind the human leopard reports from the moral panic they aroused.</p>
                        <ul>
                                <li>T.J.Alldridge, <em>The Sherbro and its Hinterland</em> (London 1901), Ch.16.</li>
                                <li>K.J.Beattie, <em>Human Leopards</em> (London 1915)</li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Leopard_society"> </iframe>
                        </div>';
                        break;
                    case 'humoi':
                        echo '<h2>Humoi</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p> A cult association among the Mende and other peoples in south-eastern Sierra Leone concerned with upholding traditional relationships and the prohibitions associated with them, as for example the rules relating to sexual relations. In particular, it supplies rites of purification for those guilty of <em>simongama</em> or &#39incest&#39, a Mende term that covers various categories of illicit sexual intercourse, such as having sex in the daytime or sex in the bush, but also physical contact of any kind with certain prohibited individuals. A few examples of wooden masks have been described as humoi masks, but their use does not seem to be widespread.</p>
                        <p>[The most detailed account of Humoi is in Harris and Sawyerr, although they have nothing to say about any masquerade associated with its activities.]</p>
                        <ul>
                                <li>W.T.Harris &amp; H.Sawyerr, <em>The Springs of Mende Belief and Conduct</em> (Freetown 1968), 93-99.</li>
                                <li>A.J.Gittins, <em>Mende Religion</em> (Nettetal 1987), 142-145. </li>
                        </ul>';
                        break;
                    case 'hunting-devil':
                        echo '<h2>Hunting Devil</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A masquerade associated with a society of hunters in Freetown or the villages of the Sierra Leone peninsula. Such hunting societies are thought to have originated among the 19th century &#39liberated Africans&#39 rescued from slave ships by the Royal Navy and brought to Freetown. Typically the masker wears a costume of sacking and netting that completely conceals his body and his headdress is a shapeless concoction of netting and animal pelts topped by animal horns. Down his back hang an assortment of snail shells, wooden spoons and combs, and chicken claws. As part of the hunting play the devil wears a cartridge belt around the waist and carries a wooden gun, and enacts a hunt in which he is baited by a dancer who plays the part of an animal and whom he eventually &#39shoots&#39 to great applause from the audience.</p>';
                        break;
                    case 'jobai':
                        echo '<h2>Jobai</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>An entertainment masquerade among the Mende. The headpiece varies from case to case but typically features a basketry frame tricked out with coloured wool and cloth, worn above a voluminous cape of undyed raffia that reaches to the ground. </p>
                        <ul>
                                <li>W.Siegmann & J.Perani, &#39Men&#39s masquerades of Sierra Leone and Liberia&#39, <em>Ethnologische Zeitschrift Z&#252rich</em>, 1980, 1, 25-40. [Illustration 12]</li>
                        </ul>';
                        break;
                    case 'jobulii':
                        echo '<h2>Jobulii</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A Mende masker which, like <em>Kongolii</em> (q.v.), provides entertainment and a light relief to more serious masquerades of Sande and Poro. The mask is generally larger than life-size, but the facial features are generally more refined than is typically the case with Kongolii and not so ugly or distorted. </p>';
                        break;
                    case 'kantha':
                        echo '<h2>Kantha</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Temne term for a period of retreat or seclusion, particularly the year-long period of seclusion and ritual preparation that precedes the ceremonial installation of a Temne paramount chief. By extension it is often applied to the fenced-off area where the chief-to-be and his ceremonial chiefs, the Kaprs, pass their time of preparation.</p>';
                        break;
                    case 'keleng':
                        echo '<h2>Keleng</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p> Temne name for a musical instrument consisting of a hollowed log with lengthwise slits that is played with two beaters. It is called kilii in Mende, n&#39kali in Limba. They vary greatly in size but are most commonly between three and four feet long. Typically they are played while suspended by a cord attached to the two ends that passes over both shoulders and around the neck of the player.</p>
                        <ul>
                                <li>C.van Oven, <em>An Introduction to the Music of Sierra Leone</em> (Private publication 1981)</li>
                        </ul>';
                        break;
                    case 'kisi':
                        echo '<h2>Kisi</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>An ethno-linguistic group living in the east of Sierra Leone on the border with Guinea and Liberia and with significant populations in both those countries. With the Bullom (q.v.) they have a claim to be the oldest inhabitants in the area, and ancient stone sculptures called <em>pomdo</em> (pl. <em>pomtan</em>) found in the ground in their present or former areas of settlement are generally attributed to the Kisi or to groups from whom they are descended. </p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Kissi_people"> </iframe>
                        </div>';
                        break;
                    case 'kisi-penny':
                        echo '<h2>Kisi Penny</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A term given to an indigenous form of African currency that was in use in the interior of Sierra Leone in the 19th century. It consists of a rough strip or rod of iron about a foot in length, t-shaped at one end.</p>';
                        break;
                    case 'kololewengoi':
                        echo '<h2>Kololewengoi</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Mende term for a distinctive item of costume worn by performers and ritual participants in a wide variety of contexts. It consists of a collar or girdle of stiff ornamented leather flaps worn around the neck or waist. It may originally have served a protective purpose as body armour in warfare, but, if so, it seems to have acquired a wider, quasi-metaphorical function as protection against malign spiritual forces.</p>
                        <ul>
                                <li>W.A.Hart, &#39Kololewengoi and the myth of the big thing&#39, RES, 2000, 37, 73-88.</li>
                        </ul>';
                        break;
                    case 'kongolii':
                        echo '<h2>Kongolii</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A Mende masker who provides entertainment and a light relief to the more serious masquerades of the Sande or Poro society. The mask is generally larger than life-size, mainly black, crudely carved with enlarged and even distorted facial features. </p>';
                        break;
                    case 'kono':
                        echo '<h2>Kono</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>An ethno-linguistic group of Mande origin which has been settled in eastern Sierra Leone since about the 16th century in what probably was territory formerly occupied by the Kisi (q.v.) or their ancestors. The evidence for the latter is that the Kono area is one of the sites where the ancient stone figure sculptures called <em>pomdo</em> (q.v.) are discovered. It is also the area where most of Sierra Leone&#39s diamond-mining is centred and consequently was the part of the country that experienced the most dramatic internal immigration and consequent social disruption in the late colonial and post-independence period. In the anarchy of the 1990s the struggle to control the sources of diamonds made it one of the areas most bitterly contested by armed groups.</p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Kono_people"> </iframe>
                        </div>';
                        break;
                    case 'kpokpo':
                        echo '<h2>Kpokpo</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>The most elaborate kind of indigenous country cloth in which cloth strips with variations in the weft are sewn together to produce a complex pattern across the cloth as a whole. In the 19th century the Vai people on Sierra Leone&#39s south eastern border with Liberia were particularly known for the quality of their strip-woven country cloths.</p>
                        <ul>
                                <li>M.C.F.Easmon, <em>Sierra Leone Country Cloths</em> (London 1924)</li>
                                <li>V.&amp;A. Lamb, <em>Sierra Leone Weaving</em> (Hertingfordbury  1984)</li>
                        </ul>';
                        break;
                    case 'krim':
                        echo '<h2>Krim</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A ethno-linguistic group closely related to the Sherbro or southern Bullom who have given their name to a few small chiefdoms in Bonthe and Pujehun districts. Their language, now all but extinct, belongs to the Mel group of languages along with Bullom, Temne, Gola and Kisi. They have largely been absorbed by their Mende neighbours. </p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Krim_language"> </iframe>
                        </div>';
                        break;
                    case 'krio':
                        echo '<h2>Krio</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A name that has come to be applied retrospectively to the black settlers and &#39liberated Africans&#39 who in the course of the 19th century came together in Freetown and in the villages of the Sierra Leone peninsula to form a new society with its own distinctive identity. It combined influences from Europe and America (the use predominantly of English surnames, Christianity, formal education) with elements that were distinctively west African (Yoruba societies, African family ceremonies, and local dietary preferences and cuisine). The Krio language is a distinctive Sierra Leone patois or creole that developed out of an earlier, more primitive form of west African coast-English that was the medium of communication between indigenous peoples (such as the Bullom and Temne) and European traders in the 18th century. It acquired from the liberated Africans a large lexicon of Yoruba terms. As the 19th century progressed the increasing wealth and education of Krio society made it restive under Sierra Leone&#39s colonial governors and lent weight to Krio demands for its citizens to play a larger role in the administration. Krios were active as middlemen in the Colony&#39s relations with the peoples of the interior, both as traders and as Christian missionaries. Within west Africa as a whole the Krios acted as the vanguard of &#39civilization&#39 and helped set up and man trading and missionary networks with other British possessions along the coast. Krio advancement suffered a setback with the declaration of the Sierra Leone Protectorate in 1896 and the growth of institutional racism that saw Africans debarred from the higher grades of the colonial service. In business also they lost ground to larger European trading firms and at the local level to Lebanese traders. They remain to this day well represented in property, in the medical and legal professions, and in higher education. But although individual Krios (notably I.T.A.Wallace-Johnson) have figured prominently in the politics of the Colony and in municipal government in the 20th century, in the lead-up to independence and in more recent years they have inevitably had a subsidiary role to up-country politicians representing the majority of Sierra Leone&#39s population in the interior.</p>
                        <ul>
                                <li>C.Fyfe, <em>A History of Sierra Leone</em> (Oxford 1962)</li>
                                <li>J.Peterson, <em>Province of Freedom: a History of Sierra Leone 1787-1870</em> (Evanston 1968)</li>
                                <li>A.Wyse, <em>The Krio of Sierra Leone: an Interpretive History</em> (London 1989)</li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Sierra_Leone_Creole_people"> </iframe>
                        </div>';
                        break;
                    case 'kuranko':
                        echo '<h2>Kuranko</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>An ethno-linguistic group, belonging to the larger Mande family of peoples, that occupy mountain areas in north-eastern Sierra Leone and adjacent parts of the Republic of Guinea. Their arrival in Sierra Leone in the 16th century is thought to have been part of the general dispersal of Mande peoples that followed the disintegration of the Mali empire. Kuranko oral traditions describe successive waves of immigration that led to them taking over territory from the Kisi to the south-east and the Limba in the west; while Temne oral traditions that trace the foundation of Temne chiefdoms in Kunike and Kolifa to the arrival in those areas of Kuranko hunters suggest that their influence once extended further into the centre of Sierra Leone than is now the case. Although in the 18th and 19th centuries Kuranko territory lay squarely on major trade routes that linked the peoples of the Upper Niger to the coast, the re-routing of commerce towards the respective colonial capitals that occurred in the colonial era and the development of new internal rail and road systems that followed have left most Kuranko on the periphery of the main economic and social changes that have affected the lives of people elsewhere in Sierra Leone.</p>
                        <ul>
                                <li>M.Jackson, The Kuranko (London 1977)</li>
                        </ul>
                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Kuranko_people"> </iframe>
                        </div>';
                        break;
                    case 'landa-landai':
                        echo '<h2>Landa/Landai</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Name of the principal mask of the men&#39s Poro society among the Kisi and Gbandi peoples on Sierra Leone&#39s eastern border with Liberia and Guinea. The mask is a large black wooden mask with long crocodile-like jaws worn flat on top of the head or inclined slightly forward, allowing the masker to see out between the jaws. There is a domed forehead and a beak-like nose with eyes on either side looking skywards. Attached to the forehead  at the back is a large crest of dark feathers.</p>
                        <ul>
                                <li>[Photographs of the mask are to be found in R.Elberl-Elber, <em>West Afrikas Letztes R�tsel</em> (Salzburg 1936, abb.194,195.]</li>
                        </ul>';
                        break;
                    case 'lantern-parade':
                        echo '<h2>Lantern Parade</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Name given to a festival of floats that in Freetown marked Eid-ul-Fitri, the end of the Muslim month of Ramadan. It is said to have been introduced to Freetown by Daddy Maggay from Banjul in the 1930s and at first only small hand-held lanterns seem to have been used, but it evolved into a torchlight procession through the city of large motorised carnival floats carrying elaborately designed structures in tissue paper, wood and wire. During the 1970s and 1980s fierce competition developed between different lantern groups, such as the different Odelay societies (q.v.), to win the prize for building the best &#39lantern&#39.</p>';
                        break;
                    case 'lasimoi':
                        echo '<h2>Lasimoi</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A smaller Muslim charm or amulet in the form of a flat ornamented rectangular leather case enclosing a folded paper with Muslim characters, such as a passage from the Qur&#39an.</p>';
                        break;
                    case 'limba':
                        echo '<h2>Limba</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>The third largest ethno-linguistic group in Sierra Leone who today occupy a wishbone-shaped territory in the north-west of the country. They have no traditions of migration and appear to have been settled in the interior of Sierra Leone as early as the 16th century. Until recently they have been one of the groups least affected by colonial and post-colonial development and they have a reputation for conservativism. Their distinctive cultural traditions remain relatively intact.</p>
                        <ul>
                                <li>R.Finnegan, Survey of the Limba People of Sierra Leone (London 1965)</li>
                                <li>W.A.Hart, &#39Woodcarving of the Limba of Sierra Leone&#39, African Arts, 1989, XXIII, 1, 44-53.</li>
                                <li>S.Ottenberg, &#39The beaded belts of Bafodea&#39, African Arts, 1992, XXV, 2, 64-75. </li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Limba_people_(Sierra_Leone)"> </iframe>
                        </div>';
                        break;
                    case 'loko':
                        echo '<h2>Loko</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>An ethno-linguistic group occupying a number of chiefdoms in north-western Sierra Leone between the Limba and the Temne. They speak a language which is closely related to Mende and it seems likely that at one time they formed a single unit with the Mende but became separated from the latter by an eastward advance of the Temne people in the 17th and 18th centuries. Their cultural institutions bear a marked resemblance to those of their Temne and Limba neighbours.</p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Loko_people"> </iframe>
                        </div>';
                        break;
                    case 'mami-wata':
                        echo '<h2>Mami Wata</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Krio name for a mermaid or mermaid-like creature that is supposed to be present in certain rivers or lakes. A water spirit. Widely represented in art across west Africa.</p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Mami_Wata"> </iframe>
                        </div>';
                        break;
                    case 'mampiring':
                        echo '<h2>Mampiring</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Kuranko name for a wooden mask that has a similar role to <a href="<?php echo $baseUrl; ?>/glossary/b/ka-bemba/">ka-Bemba</a> (q.v.) among the Temne. The masker leads boys from the village into the bush for their initiation, acts as an intermediary between the initiation camp and the village, and leads them back to the village at the completion of the initiation. It is generally oval in shape with eyes and mouth holes pierced through the plane of the mask and--a common feature of mampiring masks--a small crest of feathers protruding from the top. </p>';
                        break;
                    case 'mandingo':
                        echo '<h2>Mandingo</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p> A term used in 19th century Sierra Leone to refer to Muslim, ethnically <a href="<?php echo $baseUrl; ?>/glossary/s/soso/">Soso</a> (q.v.), elites who had set up a state called Moriah in the hinterland around the Scarcies, Melakori and Forekaria rivers. With the <a href="<?php echo $baseUrl; ?>/glossary/f/fula/">Fulas</a> (q.v.) they were thought of by Europeans as representing a higher state of African civilisation than the indigenous African peoples along the coast. In Liberia the term was used to refer to people of Mande origin whose language became a lingua franca widely used in trade. A type of overshirt with distinctive embroidered decoration worn by &#39big men&#39 in Sierra Leone and Liberia in the 19th and early 20th centuries was commonly known as a &#39Mandingo gown&#39.</p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Mandingo_people_of_Sierra_Leone"> </iframe>
                        </div>';
                        break;
                    case 'mende':
                        echo '<h2>Mende</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>The largest ethno-linguistic group in southern Sierra Leone and the most culturally dominant in the area. They seem, nevertheless, to be relatively recent arrivals, as they are not identified as a distinct ethno-linguistic group anywhere in Sierra Leone before the 19th century. It is generally assumed that they migrated westwards from the interior of Liberia. But it is possible that in many instances what happened was not that Mende immigrants displaced the indigenous inhabitants over most of southern Sierra Leone, but that the numbers of those using Mende as their everyday language increased generation on generation at the expense of the indigenous languages Krim and Bullom (a process we can observe at the present day); and that many who think of themselves as Mende today could be descended from Krim, Bullom or Temne speakers. Three groups of Mende are commonly distinguished corresponding to different Mende dialects: the Kpa Mende, west of the Jong or Teye river; the Sewa Mende, between the Jong and the Waanje rivers; and the Ko Mende, east of the Waanje. (There are certain cultural differences between them. The <a href="<?php echo $baseUrl; ?>/glossary/w/wunde/">Wunde</a> society (q.v.) is found only among the Kpa Mende; elsewhere in Mendeland its place is taken by the Poro society.) Mende cultural institutions such as the Sande society have been widely studied and the artworks associated with them, notably Sande helmet masks, are the best known objects to have come out of Sierra Leone. However there is no general stylistic marker that distinguishes Mende artefacts from those of their Bullom neighbours and there is a good deal of cultural overlap between the two groups.</p>
                        <ul>
                                <li>K.Little, <em>The Mende of Sierra Leone</em> (London 1967)</li>
                                <li>W.T.Harris & H.Sawyerr, <em>The Springs of Mende Belief and Conduct</em> (Freetown 1968)</li>
                                <li>A.Abraham, <em>Mende Government and Politics under Colonial Rule</em> (Oxford 1978)</li>
                                <li>A.J.Gittins, <em>Mende Religion</em> (Nettetal 1987) </li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Mende_people"> </iframe>
                        </div>';
                        break;
                    case 'min':
                        echo '<h2>Min (Pl. Min-Se-Le)</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>[minsereh]  Southern Bullom word for &#39spirit&#39. T.J.Alldridge (q.v.) in his early writings on Sierra Leone referred to the carved wooden female figures of the Yasi society as &#39minsereh&#39 (mistaking the plural form of &#39min&#39 for the figures&#39 proper name) and later writers followed his lead, describing all carved wooden female figures from southern Sierra Leone as &#39minsereh&#39, whether or not they were from a Bullom area or were known to be linked to Yasi (or Njayei, its Mende equivalent). </p>
                        <ul>
                                <li>T.J.Alldridge, <em>The Sherbro and its Hinterland</em> (London 1901), Ch.15.</li>
                                <li>W.A.Hart, &#39So-called &#39minsereh&#39 figures from Sierra Leone&#39, <em>African Arts</em>, 1984, XVIII, 1, 84-86.</li>
                        </ul>';
                        break;
                    case 'nafali':
                        echo '<h2>Nafali</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A masker described by Alldridge as the herald of <a href="<?php echo $baseUrl; ?>/glossary/g/gbeni-gbini/">Gbini</a> (q.v.), but which seems in more recent times to be viewed simply as a source of entertainment. The headpiece is a cloth-covered wicker frame rounded at the top and trimmed with white fur. Typically front and rear surfaces are decorated with a mirror, cowrie shells and coloured strips of cloth. The costume is a loose cloth suit with a raffia cape about the shoulders, a raffia skirt around the waist, and raffia fringes covering the feet. </p>
                        <ul>
                                <li>W.Siegmann & J.Perani, &#39Men&#39s masquerades of Sierra Leone and Liberia&#39, <em>Ethnologische Zeitschrift Z�rich</em>, 1980, 1, 25-40.</li>
                                <li>R.B.Phillips, <em>Representing Woman</em> (Los Angeles 1995), Ch.3.</li>
                        </ul>';
                        break;
                    case 'namankera':
                        echo '<h2>Namankera</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Masker of the RaGbenle society among the eastern Temne. The name &#39Namankera&#39 means &#39messenger&#39 and he is said to go from village to village in advance of the paramount chief&#39s coronation to tell people when and where the ceremonies are to take place. He wears a costume of undyed raffia with a wooden black and white spotted mask that terminates in a round tube-like snout. </p>
                        <ul>
                                <li>N.W.Thomas, <em>Anthropological Report on Sierra Leone</em> (London 1916). [Plate v]</li>
                                <li>V.R.Dorjahn, &#39The organisation and  functions of the Ragbenle Society of the Temne&#39, <em>Africa</em>, 1959, XXIX, 2, 156-170. </li>
                        </ul>';
                        break;
                    case 'ndoli-jowei':
                        echo '<h2>Ndoli Jowei</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>[dancing sowei]  Mende name for the masker who wears the black wooden helmet mask that is the public embodiment of the women&#39s Sande society (q.v.). It is perhaps a unique case in Africa of a woman dancing wearing a female mask. The mask represents Mende conceptions of idealised womanhood and typically shows hair carefully dressed in one of the styles historically favoured by Mende women, a ringed neck (considered a mark of beauty), and fine facial features composed in a dignified expression  The mask is worn with a costume of black raffia and black cloth that completely conceals the body of the wearer.</p>
                        <ul>
                                <li>R.B.Phillips, <em>Representing Woman</em> (Los Angeles 1995) </li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Sande_society"> </iframe>
                        </div>';
                        break;
                    case 'njayei':
                        echo '
                        <h2>Njayei</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>(Yasi in Bullom)  Mende name for a cult association that has its own source of spiritual power (<em>halei</em>) that it uses to diagnose various kinds of ritual pollution and to purify those who have wittingly or unwittingly incurred pollution. A symptom of the latter is some form of mental derangement or illness and Njayei is said to be specially empowered by its medicine (<em>halei</em>) to cure mental illness. Its sacred house is distinguished by walls that are daubed with white, red and black spots, and Njayei for that reason has sometimes been referred to as &#39the society of spots&#39. It has both male and female members. This is reflected in the sculptures made for it, which typically are a pair of figures, one male and one female. </p>
                        <ul>
                                <li>A.J.Gittins, <em>Mende Religion</em> (Nettetal 1987), 145-147.</li>
                                <li>W.A.Hart, &#39Sculptures of the Njayei Society of the Mende of Sierra Leone&#39, <em>African Arts</em>, 1993, XXVI, 3, 46-53.</li>
                        </ul>';
                        break;
                    case 'njayekoi':
                        echo '<h2>Njayekoi</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Mask of the spirit of the <a href="<?php echo $baseUrl; ?>/glossary/n/njayei/">Njayei</a> society (q.v.). The form of the mask seems to vary from place to place.</p>
                        <ul>
                                <li>A.J.Gittins, <em>Mende Religion</em> (Nettetal 1987), 145-147.</li>
                                <li>W.A.Hart, &#39Sculptures of the Njayei Society of the Mende of Sierra Leone&#39, <em>African Arts</em>, 1993, XXVI, 3, 46-53.</li>
                        </ul>';
                        break;
                    case 'nomoli':
                        echo '<h2>Nomoli</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>(pl. nomolisia)  Mende term for ancient stone figure sculptures found buried in the ground in south-eastern Sierra Leone and presumed to have been made by the original inhabitants of the country. They are characterised by large heads cantilevered forward from the neck, prominent eyes, broad fleshy nose and full lips. Their original function is obscure but the representation of nose- and ear-rings on some figures and of shields and weapons on others would suggest that they portray chiefs or group leaders of some kind. The date of their production has been a source of speculation. Stylistically they bear a resemblance to figures carved on Sapi-Portuguese ivories (q.v.) made by Sierra Leone artists for Portuguese patrons at the end of the 15th and first quarter of the 16th century, but contemporary Portuguese sources say nothing about stone sculpture in Sierra Leone at this time, and the carving of the nomoli figures may have been discontinued many years earlier. The Mende who find the stone figures make no claim to have made them but use them as &#39rice gods&#39 to encourage the growth of their crops. </p>
                        <ul>
                                <li>A.Tagliaferri & A.Hammacher, <em>Fabulous Ancestors</em> (Milan 1974)</li>
                                <li>W.A.Hart & C.Fyfe, &#39Stone sculptures of the Upper Guinea Coast&#39, <em>History in Africa</em>, 1993, 20, 71-87. </li>
                        </ul>';
                        break;
                    case 'a-nowo':
                        echo '<h2>A-Nowo</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Temne name for the masker who wears the black wooden helmet mask that is the public manifestation of the women&#39s <a href="<?php echo $baseUrl; ?>/glossary/b/bondo/">Bondo</a> society (q.v.).</p>
                        <ul>
                                <li>F.J.Lamp, &#39Cosmos, cosmetics and the spirit of Bondo&#39, <em>African Arts</em>, 1985, 18/3, 28-43.  </li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Sande_society"> </iframe>
                        </div>';
                        break;
                    case 'odelay-society':
                        echo '<h2>Odelay Society</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A men&#39s society of Yoruba origin that, like the <a href="<?php echo $baseUrl; ?>/glossary/o/ojeh-society/">Ojeh</a> society (q.v.), emerged first among Africans liberated from slave ships by the Royal Navy in Freetown and the villages of the Sierra Leone peninsula in the course of the 19th century. According to John Nunley, who has studied the society, its organisation and masquerades draw upon different indigenous Yoruba traditions such as those of the Gelede, Egungun and Hunting societies. including the worship of Ogun, the Yoruba god of iron. Its most familiar manifestations are in street processions to mark weddings or the return of hunters from the bush, where groups dressed in matching costume (ashoebi) combine with musicians and a dancing masquerader. Odelay masquerades in  the later 20th century became known for their variety and inventiveness. Whereas older headpieces generally show only a serene painted female face or a carved antelope head, some of the headpieces recorded by Nunley from the 1980s are highly elaborate compositions in a wide variety of natural and man-made materials combining what  he characterises as contrasting elements of the fancy and the fierce. Odelay groups have also been involved in the construction of floats for Freetown&#39s <a href="<?php echo $baseUrl; ?>/glossary/l/lantern-parade/">Lantern Parade</a> (q.v.).</p>
                        <ul>
                                <li>J.W.Nunley, <em>Moving with the Face of the Devil</em> (Urbana/Chicago 1987) </li>
                        </ul>';
                        break;
                    case 'ojeh-society':
                        echo '<h2>Ojeh Society</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Colloquial name for society of Yoruba origin that emerged from among the so-called &#39liberated Africans&#39 [i.e. those rescued from slave ships by the Royal Navy] in Freetown and the villages of the Sierra Leone peninsula in the course of the 19th century. Its Yoruba name is Egungun which was corrupted by missionary writers to egugu or agoogoo. Ojeh or Oje, the name by which it is widely known today, is the term for a society group or lodge. In the 20th century it spread among groups of young migrant workers outside of the peninsula and Ojeh groups are now to be found widely distributed throughout Sierra Leone, for example among the Temne. Ojeh &#39devils&#39 or masked dancers perform in a brightly variegated costume of coloured cloth that covers the head and reaches down to the calves. The face of the masker is concealed behind a grill of netting.  </p>
                        <ul>
                                <li>J.W.Nunley, <em>Moving with the Face of the Devil</em> (Urbana/Chicago 1987)</li>
                        </ul>';
                        break;
                    case 'pomdo':
                        echo '<h2>Pomdo (Pl. Pomtan)</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Kisi name for the ancient stone figure sculptures which they find buried in the soil and which they attribute to their ancestors and place in ancestral shrines. Stylistically they are different from the nomoli sculptures found closer to the coast, being more angular and roughly carved. Many, indeed, are only slightly modified columnar forms. A few of the more elaborate examples appear to be wearing ridged caps (or a high-ridged hair-style) and feature body markings and the so-called &#39archaic smile&#39 in which the lips are drawn back to reveal sharply pointed teeth.</p>
                        <ul>
                                <li>A.Tagliaferri & A.Hammacher, <em>Fabulous Ancestors</em> (Milan 1974)</li>
                                <li>W.A.Hart & C.Fyfe, &#39Stone Sculptures of the Upper Guinea Coast&#39, <em>History in Africa</em>, 1993, 20, 71-87. </li>
                        </ul>';
                        break;
                    case 'poro':
                        echo '<h2>Poro</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p> A name used throughout Sierra Leone for the men&#39s society that is responsible for organising the initiation that prepares boys and young men for adult life. In the past it was described by Europeans as akin to freemasonry and credited with country-wide organisation and political power to impose respect for its laws and decisions, even against the will and over the heads of the chiefs, the traditional rulers. As with the Bondo/Sande society, it has had to modify its practices to meet the demands of contemporary Sierra Leone society, but it remains a potent force in most country areas and its prohibitions are strictly observed. Near most villages there is a Poro &#39bush&#39, a clearing in an area of virgin forest, where Poro members meet to discuss society business and which is closed to non-members. The highest ranking member of Poro is called Taso in Mende and <em>Kashi</em> in Temne. He wears an openwork headdress of wood and cane exhibiting human skulls and thighbones said to be those of former <em>Tasos/Kashis</em>, the whole being crowned by a spreading crest of feathers. To become a <em>Taso/Kashi</em> requires the payment of a fee, a period of apprenticeship or training in the use of special medicines, and a formal initiation by someone who already holds that rank. The initiation of boys and young men, as with that of girls, takes the form of a period of seclusion at a camp in the forest where they receive instruction and moral education through Poro songs and stories that emphasise the values of co-operation and solidarity and respect for the elders. If they have not already been circumcised, they are circumcised at the start of their time in the forest and given a Poro name. Towards the end of the initiation they are put through a series of trials and ordeals to test their manhood. In the past they also received the Poro sign in the form of a series of cicatrization marks around the back and shoulders. The antiquity of the Poro in Sierra Leone is testified to both by descriptions of Poro officials such as <em>Taso/Kashi</em> by European observers from the mid-18th century onwards and by references to the society and its activities that go back to the start of the 17th century. </p>
                        <ul>
                                <li>[For the earliest references to Poro in the historical literature see: W.A.Hart, &#39The lawyer of Poro?&#39, RES, 1993, 23, 83-95]</li>
                                <li>T.J.Alldridge, <em>The Sherbro and its Hinterland</em> (London 1901), Ch.13.</li>
                                <li>N.W.Thomas, <em>Anthropological Report on Sierra Leone</em> (London 1916), 143-146.</li>
                                <li>V.R.Dorjahn, &#39The initiation of Temne Poro officials&#39, <em>Man</em>, 1962, 36-40.</li>
                                <li>A.J.Gittins, <em>Mende Religion</em> (Nettetal 1987), 147-152. </li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Poro"> </iframe>
                        </div>';
                        break;
                    case 'ragbenle':
                        echo '<h2>RaGbenle</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A ritual association of the eastern Temne, where in particular it is involved in the ceremonies surrounding the installation/crowning of the paramount chief. It has other roles, including that of ritual purification following pollution and protection against hostile spiritual forces. The earliest description of the association is in manuscript by a Jesuit missionary in Sierra Leone in the first decade of the 17th century. In the 17th century, as today, it is associated with the wearing of masks. The masks commonly described as RaGbenle masks today are <em>a-rong a-thoma</em>, a wooden polychrome mask with flaring nostrils; <em>namankera</em>, a wooden polychrome (black and white) mask with a round tube-like snout; and <em>butu</em>, a mask similar to <em>namankera</em> but with a shorter tube-like snout.</p>
                        <ul>
                                <li>N.W.Thomas, <em>Anthropological Report on Sierra Leone</em> (London 1916), 146-149.</li>
                                <li>V.R.Dorjahn, &#39The organisation and  functions of the Ragbenle Society of the Temne&#39, <em>Africa</em>, 1959, XXIX, 2, 156-170. </li>
                        </ul>';
                        break;
                    case 'rice-fanner':
                        echo '<h2>Rice Fanner</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A lightweight, circular tray of woven leaves or raffia about two feet in diameter used by women to winnow the rice for cooking from the indigestible husks by which it is surrounded. The unhusked rice is first placed in a wooden mortar and pounded with a pole to separate the rice from the husk. Rice and loosened husks are then placed in the fanner or winnowing tray which a woman holds in both hands in front of her, flicking the rice and husks upwards so that the breeze carries the light husks away, leaving the rice behind. </p>';
                        break;
                    case 'a-rong-a-rabai':
                        echo '<h2>A-Rong-A-Rabai</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>[the mask of chiefship]  General term referring to a group of masks that represent different chiefly families or clans among the Temne. They are invariably made of brass, which is the metal particularly associated by the Temne with chiefship, and typically take the form of a helmet mask covering the whole head, with one or two brass faces. They appear rarely, usually heralding the appearance of the paramount chief at the conclusion of the ceremonies of his ritual coronation as chief. Each mask of chiefship has its own name which links it to the chiefly family or clan whose spirit or &#39kerfi&#39 he embodies: thus the mask of the Tarrawali chiefs in Makari-Gbanti chiefdom is Pa-a-Tharrma [Head of the Tarrawalis]; the mask of the Jallohs in Yoni chiefdom is Pa-a-Yalu [Head of the Jallohs]; the mask of the Kanus in Buya-Romende chiefdom is Pa-a-Kenthi [Head of the Kanus]; and so on. </p>
                        <ul>
                                <li>W.A.Hart, &#39The mask of a Temne dynasty&#39, <em>Bulletin of the Barbier-M�ller Museum</em>, 1990, 1, 3-15. </li>
                        </ul>';
                        break;
                    case 'a-rong-a-thoma':
                        echo '<h2>A-Rong A-Thoma</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>[the Thoma mask]  A mask associated with the RaGbenle society among the eastern Temne.  It always seems to be danced in pairs. It is a wooden polychrome mask with a domed head framed at the sides by horns, and flaring nostrils above a gaping toothed mouth partly concealed by black animal hair. It is worn on top of the head with a fringe of reddish-dyed raffia, below which is a reddish-dyed raffia cape and raffia leggings. The pair of masks perform in a number of Temne chiefdoms in Kolifa and Kuniki, but seem nowadays to originate from the town of Yele in Gbonkolenken chiefdom, where it is said there was an original mask that appeared magically out of the waters of the nearbye Taia River.</p>
                        <ul>
                                <li>N.W.Thomas, <em>Anthropological Report on Sierra Leone</em> (London 1916). [Plate V]</li>
                                <li>F.J.Lamp, &#39The royal horned hippopotamus of the Keita of Temne: <em>a-Rong a-Thoma</em>&#39, <em>Yale University Art Gallery Bulletin</em> 2005, 37-54. [Aside from Lamp&#39s initial dubious claim that <em>a-Rong a-Thoma</em> represents a hippopotamus, the <em>tana</em> or totemic animal of the Kanu (or Keita), one of ruling families or clans in Gbonkolenken chiefdom, this is generally a well-informed and comprehensive account of the masquerade.] </li>
                        </ul>';
                        break;
                    case 'ronko':
                        echo '<h2>Ronko</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A shirt or gown made of strips of country cloth, typically dyed a rusty reddish brown using local pigments. In the past such pigments were seen as having spiritual protective powers. The shirts were worn by hunters and others engaged in dangerous pursuits. They are still worn today by male initiates in the course of their initiation into adulthood and by Temne paramount chiefs at the culmination of their ceremonies of installation. It is said that such shirts and gowns should never be washed. In the early 1990s when President Momoh, a Limba, was Head of State, modern secular versions of  the Limba shirt (<em>hu-ronko</em>) decorated with black stamped motifs enjoyed prestige beyond the villages of northern Sierra Leone in which they were produced.</p>
                        <ul>
                                <li>S.Ottenberg, &#39Decorated hu-ronko shirts from northern Sierra Leone&#39, <em>African Arts</em>, 2007, 40, 4, 14-31. </li>
                        </ul>';
                        break;
                    case 'roponka':
                        echo '<h2>Roponka</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A village in Kafu Bullom chiefdom, north of the Sierra Leone River, where there has been preserved from some indefinite time in the past brass figural castings that local tradition says were given to a chief in Roponka by the Portuguese. More recent research by Ezio Bassani has pointed out their resemblance to a group of ancient brass staves and staff finials called <em>sono</em> from Senegambia, possibly of Malinke origin, that would suggest an African provenance. </p>
                        <ul>
                                <li>U.H.Koroma, &#39The bronze statuettes of Ro-Ponka&#39, <em>Sierra Leone Studies</em>, XXII, 8, 25.</li>
                                <li>E.Bassani, &#39Sono from Guinea Bissau&#39, <em>African Arts</em>, 1979, XII, 4, 44-47. </li>
                        </ul>';
                        break;
                    case 'sampa':
                        echo '<h2>Sampa</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A dancer associated with the Bondo society, generally dressed in a string netted vest and raffia skirt with iron rattles on her calves. Wears a cap with a high ridge running front to back, sometimes adorned with plumes.</p>';
                        break;
                    case 'sande':
                        echo '<h2>Sande</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Mende name for a women&#39s society that is responsible for the preparation and education of girls for their role as adult women. In the past all girls approaching puberty were initiated into Sande and had to spend a lengthy period, perhaps even several years, separated from their families in seclusion in the society &#39bush&#39, a clearing in the forest near the village, under the guidance of mature women who acted as their instructors and models. Today the period of initiation is often drastically reduced to a few weeks to fit in with school holidays. The return of the initiates to the village at the close of their initiation is an occasion for public rejoicing and family pride. Clitorodectomy, in at least some modified form, is an essential part of the Sande initiation. Sande is not a centralised institution, but takes the form of numerous more or less independent local lodges with common practices and traditions. Higher-ranking members of Sande are known as <em>sowei</em>. The most striking public manifestation of Sande is the masker called <em>ndoli jowei</em> or &#39the dancing sowei&#39, who wears a black-dyed wooden helmet mask above a costume of black-dyed raffia and cloth. The mask is an idealised image of female beauty and dignity. The equivalent society among the Bullom and Temne is known as <a href="<?php echo $baseUrl; ?>/glossary/b/bondo/">Bondo</a> (q.v.).</p>
                        <ul>
                                <li>M.C.Jedrej, &#39Medicine, fetish and secret  society in a west African culture, <em>Africa</em>, 1976, 46, 247-257.</li>
                                <li>C.P.MacCormack, &#39Sande: the public face of a secret society&#39, in B.Jules-Rosette, ed., <em>The New Religions of Africa</em> (New Jersey 1979), 27-37.</li>
                                <li>S.A.Boone, <em>Radiance from the Waters</em> (New Haven/London 1986)</li>
                                <li>R.B.Phillips, <em>Representing Woman</em> (Los Angeles 1995) </li>
                        </ul>
                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Sande_society"> </iframe>
                        </div>';
                        break;
                    case 'sapi-portuguese-ivories':
                        echo '<h2>Sapi-Portuguese Ivories</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Term used by European art historians to describe a group of ivory objects made by African artists in Sierra Leone for Portuguese patrons around the end of the 15th and the first quarter of the 16th century. They include hunting horns, saltcellars, pyxes, forks and spoons. As works of art and objects of prestige they were from an early date exchanged as gifts between the royal and princely courts of Europe. They display a mixture of African and European elements and motifs in their overall form and ornamentation. &#39Sapi&#39 was the name used by the 16th century Portuguese to refer generally to a number ethno-linguistic groups in Sierra Leone with whom they were in contact, such as the Bullom and Temne. [The broader term &#39Afro-Portuguese&#39 includes both the Sapi-Portuguese works from Sierra Leone and the Bini-Portuguese works from Benin in Nigeria.] </p>
                        <ul>
                                <li>E.Bassani & W.B.Fagg, <em>Africa and the Renaissance</em> (New York 1988) [Bassani has continued to update the catalogue raisonn� provided at the end of this book in subsequent articles and exhibition catalogues.]</li>
                        </ul>';
                        break;
                    case 'saraka':
                        echo '<h2>Saraka</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>[also satka, sarake]  A term that comes from the Arabic word for &#39sacrifice&#39 found in a number of languages in Sierra Leone. Its use is wider than the term &#39sacrifice&#39 in English, referring not only to rituals in which something is killed or offered up, but to a wide range of ritual transactions in which spiritual power is invoked in the presence of some material object to avert some evil or to bring about some good. By extension the term is also applied to the material object itself as the witness or guarantor of the transaction. </p>
                        <ul>
                                <li>N.W.Thomas, <em>Anthropological Report on Sierra Leone</em> (London 1916), 52-60. </li>
                        </ul>';
                        break;
                    case 'sebe':
                        echo '<h2>Sebe</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>A amulet or charm of Muslim origin, usually consisting of an extract from the Qur&#39an or sacred diagram, folded up and sewn into a rectangular case made of leather and ornamented with raffia strips and leather buttons.  In the 19th century they were also sometimes embellished with silver. Worn on a leather string around the neck or alternatively sewn on to a country cloth gown or cap.  The term also applies to amulets made from the horns of animals: these were likewise sometimes decorated with silver. </p>';
                        break;
                    case 'segbula':
                        echo '<h2>Segbula</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>(segureh)  A percussion instrument consisting of a smaller calabash or gourd around which there is a network of string to which are attached numerous small pieces of shell. The gourd is held by the neck in one hand while the other hand tightens the drawstrings of the net, causing the shells to clash rhythmically against the sides of the gourd. Used exclusively by women. </p>
                        <ul>
                                <li>C.van Oven, <em>An Introduction to the Music of Sierra Leone</em> (Private publication  1981) </li>
                        </ul>';
                        break;
                    case 'an-seth-a-masim':
                        echo '<h2>An-Seth A-Masim</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>Temne name for the house in a village in which are kept various items of sacred paraphernalia or medicines associated with chiefship. It is typically a round house (an older form of house not generally found today in Temne villages) and has a single door covered by an untrimmed mat.</p>';
                        break;
                    case 'sherbro':
                        echo '<h2>Sherbro</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p> 

                        <p>The name commonly given to the southern <a href="<?php echo $baseUrl; ?>/glossary/b/bullom/">Bullom</a> (q.v.) who inhabit Sherbro island and the adjacent chiefdoms.</p>
                        <ul>
                                <li>T.J.Alldridge, <em>The Sherbro and its Hinterland</em> (London 1901).</li>
                                <li>H.U.Hall, <li>The Sherbro of Sierra Leone</li> (Philadelphia 1938) </li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Sherbro_people"> </iframe>
                        </div>';
                        break;
                    case 'shuku-blai':
                        echo '<h2>Shuku blai</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p> 

                        <p>Temne name for a type of finely made and ornamented coil-weave basket made by Temne women. They are roughly spherical in shape,  lidded and made in a range of different sizes.</p>';
                        break;
                    case 'sowei':
                        echo '<h2>Sowei</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p> 

                        <p>Mende name for a senior member of the women&#39s Sande society; and by extension the name sometimes applied to the black wooden helmet mask that is worn by the Sande masker, the ndoli jowei or &#39dancing sowei&#39. </p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Sande_society"> </iframe>
                        </div>';
                        break;
                    case 'soso':
                        echo '<h2>Soso</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p> 

                        <p>(often written Susu)  An ethno-linguistic group of Mande origin that straddle Sierra Leone&#39s western border with the Republic of Guinea. Within Sierra Leone today they are mainly confined to Kambia district. They are closely related to the <a href="<?php echo $baseUrl; ?>/glossary/y/yalunka/">Yalunka</a> (q.v.) and, like them, claim to have originated in Futa Jallon, but they have been settled in the lowlands of Guinea since at least the 16th century. By the middle of the 18th century the eastern Sosos (those living around the Scarcies, Melakori and Forekaria rivers) had been converted to Islam under the influence of Muslim missionaries and were generally referred to as <a href="<?php echo $baseUrl; ?>/glossary/m/mandingo/">Mandingoes</a> (q.v.). Their state, Moriah, had as its capital Forekaria. </p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Susu_people"> </iframe>
                        </div>';
                        break;
                    case 'temne':
                        echo '<h2>Temne</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p>The Temne are one of the two main ethno-linguistic groups in Sierra Leone, occupying a large swathe of the west and centre of the country. Their language belongs to the Mel cluster of West Atlantic class-based languages that includes Baga, Limba, Bullom, Gola and Kisi. According to Temne traditions they came originally from Futa Jallon, a mountain escarpment in what is today the Republic of Guinea, but they had already broken through to the Atlantic coast around the Sierra Leone River by the 15th century when Portuguese ships first made landfall there; and it seems likely that the Sapi-Portuguese ivories (q.v.) were carved for the Portuguese by Temne or Bullom artists. Temne and Bullom society at that date seems to have been organised into more or less independent small chiefdoms. Around the middle of the 16th century these chiefdoms were overwhelmed by raiding parties from the east whom the Portuguese called &#39Mane&#39 (probably groups set in motion by the break up of the Mali empire). Linguistic and other evidence has tended to discredit the view that this so-called &#39Mane invasion&#39 involved a major migration of  population into the coastal area and suggests that it entailed only a change in the ruling elite. Within a generation, moreover, the new rulers seem to have been absorbed into Temne society. Although the effects on the Temne of this particular incursion seem, therefore, to have been relatively short-lived, it is likely that it was only one in a series of such events originating in the interior whereby Temne society has come to have many cultural features in common with the Manding societies of the Sudan. The extent to which what are now thought of as indigenous Temne institutions, such as <a href="<?php echo $baseUrl; ?>/glossary/r/ragbenle/">ra-Gbenle</a> (q.v.), or Temne chiefship with its distinctive features and ceremonies, might be Manding in their origin or be a response to contact with Manding incomers is one of the more controversial questions in Sierra Leone history. </p>
                        <ul>
                                <li>[There is no single work that covers the history of the Temne as a whole. Paul Hair makes a number of suggestive remarks about the 16th century Temne in the notes and commentaries that accompany his translations of 16th and 17th century Portuguese texts but they are not drawn together in a connected narrative. Other researchers (Songo-Davies, Dorjahn, Ijagbemi, Lenga-Kroma) content themselves with describing the historical origins of individual Temne chiefdoms. This may of course say something about the Temne themselves: that they are not a homogeneous people so much as a number of culturally overlapping but largely autonomous rural communities.] </li>
                                <li>P.E.H.Hair</li>
                                <li>J.A.Songo-Davies, &#39Origin of the Masimera Chiefdom in the northern province&#39, <em>Sierra Leone Studies</em>, 1928, XIII, </li>
                                <li>V.R.Dorjahn, &#39A brief history of the Temne of Yoni&#39, <em>Sierra Leone Studies</em>, 1960,</li>
                                <li>A.E.Ijagbemi, &#39Oral tradition and the emergence of Temne chiefdoms&#39, <em>Africana Research Bulletin</em>, 1977, VII, 2, 3-35.</li>
                                <li>J.S.Lenga-Kroma, <em>A History of the Southern Temne in the Late 19th and Early 20th Century</em> (Edinburgh University Ph.D. Thesis 1978.</li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Temne_people"> </iframe>
                        </div>';
                        break;
                    case 'thoma':
                        echo '<h2>Thoma</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p> 

                        <p>A society for both men and women among the Sherbro or southern Bullom people of Sherbro island.  Two pairs of masks are associated with the society: a pair of wooden helmet masks, more or less human in form, painted in bright colours, and worn with a long cape of undyed raffia; and a contrasting pair of wooden zoomorphic masks painted in the same bright colours and also worn with a long cape of undyed raffia. There are oral traditions that this masquerade came originally from the &#39Baga&#39, which may however be a reference to the Temne.</p>
                        <ul>
                                <li>[There is no single work that covers the history of the Temne as a whole. Paul Hair makes a number of suggestive remarks about the 16th century Temne in the notes and commentaries that accompany his translations of 16th and 17th century Portuguese texts but they are not drawn together in a connected narrative. Other researchers (Songo-Davies, Dorjahn, Ijagbemi, Lenga-Kroma) content themselves with describing the historical origins of individual Temne chiefdoms. This may of course say something about the Temne themselves: that they are not a homogeneous people so much as a number of culturally overlapping but largely autonomous rural communities.] </li>
                                <li>H.U.Hall, <em>The Sherbro of Sierra Leone</em> (Philadelphia 1937)</li>
                                <li>C.P.MacCormack, &#39Proto-social to adult: a Sherbro transformation&#39, in C.P.McCormack & M.Strathern, eds., <em>Nature, Culture and Gender</em> (Cambridge 1980), 95-118.</li>
                        </ul>';
                        break;
                    case 'tongo-players':
                        echo '<h2>Tongo Players</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p> 

                        <p>Name given to a group of professional witchfinders who were called in to investigate and detect members of the <a href="<?php echo $baseUrl; ?>/glossary/h/human-leopards/">Human Leopard</a> society (q.v.) blamed for a series of murders in Imperri chiefdom in the early 1890s. The large numbers of those they identified as being Human Leopards and the summary way in which the Tongo players proceeded to kill them alarmed the Colonial Government which passed legislation banning all Tongo activity.</p>
                        <ul>
                                <li>[There is no single work that covers the history of the Temne as a whole. Paul Hair makes a number of suggestive remarks about the 16th century Temne in the notes and commentaries that accompany his translations of 16th and 17th century Portuguese texts but they are not drawn together in a connected narrative. Other researchers (Songo-Davies, Dorjahn, Ijagbemi, Lenga-Kroma) content themselves with describing the historical origins of individual Temne chiefdoms. This may of course say something about the Temne themselves: that they are not a homogeneous people so much as a number of culturally overlapping but largely autonomous rural communities.] </li>
                                <li>T.J.Alldridge, <em>The Sherbro and its Hinterland</em> (London 1901), Ch.16.</li>
                                <li>K.J.Beattie, <em>Human Leopards</em> (London 1915) </li>
                        </ul>';
                        break;
                    case 'vai':
                        echo '<h2>Vai</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p> 

                        <p>A ethno-linguistic group of Mande origin who occupy a  number of coastal chiefdoms either side of the Sierra Leone-Liberian border, where they are thought to have been settled since at least the 16th century. It has been suggested that they and the Kono (q.v.) were originally one people, but that they were split off from one another by a later wedge of immigrants, possibly the Mende, moving from the interior of Liberia into south-eastern Sierra Leone. They share a number of cultural institutions, such as the Sande society, with their Mende and Gola neighbours. In the 19th century they were particularly known for their weaving of fine country cloths and for the invention of a indigenous Vai script. </p>
                        <ul>
                                <li>G.W.Ellis, <em>Negro Culture in West Africa</em> (New York 1914)</li>
                                <li>A.Jones, &#39Who were the Vai?&#39, <em>Journal of African History</em>, 1981, 22, 159-78. </li>
                        </ul>
                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Vai_people"> </iframe>
                        </div>';
                        break;
                    case 'war-horns':
                        echo '<h2>War Horns</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p> 

                        <p>A description commonly applied in the 19th century to ivory horns or oliphants from Sierra Leone and Liberia that were played by the horn-blowers who attended on chiefs. Typically they are side-blown, with the mouthpiece on the inner or concave side of the horn. Typically also they are pierced through the closed end of the horn forming a stop-hole that the horn-blower could cover or uncover with his thumb, allowing him to change the note. Different sized horns were sometimes combined together in an ensemble. Although such horns presumably were from time to time sounded in the heat of battle when the chief was present, their primary purpose seems to have been to announce and celebrate the presence of chief in whatever he happened to be doing. They are therefore more appropriately described simply as &#39chiefs&#39 horns&#39.</p>
                        <ul>
                                <li>W.A.Hart, &#39Early-nineteenth century chiefs&#39 horns from coastal Liberia&#39, <em>African Arts</em>, 1999, XXXII, 3, 62-67. </li>
                        </ul>';
                        break;
                    case 'warri':
                        echo '<h2>Warri</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p> 

                        <p>(Mende: ti)  A wooden board game, variants of which are found all over Africa. The Sierra Leone version consists of a carved wooden board in which two rows of six cups are set alongside one another, with two larger receptacles at either end. Twenty-four seeds are distributed around the board, four in each cup, and the object of the game is to win as many seeds a possible by distributing all the seeds in any cup on one&#39s own side anticlockwise, one to each cup, so as to end up in a cup on the opponent&#39s side that has only one or two seeds. These are then &#39captured&#39 and added to one&#39s &#39captives&#39 in the larger receptacle to one&#39s right. The person who gains more than half of the seeds is the winner. </p>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Mancala"> </iframe>
                        </div>';
                        break;
                    case 'wunde':
                        echo '<h2>Wunde</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p> 

                        <p>A traditional association among the Kpa Mende (or western Mende) dialect group which appears in the past to have acted as that group&#39s military arm. Unlike Poro, where power is widely diffused between more or less independent local groups, Wunde appears to have a more unitary organisation and its initiations are confined to a few selected sites. It structure is hierarchical but different accounts have been given of the separate ranks and their order of precedence. The <em>kamakoweisia</em> perform a dance at night around a fire wearing a distinctive high headress: an ornamented cap tapering in a long tube with a crown of woodcock feathers at the top.</p>
                        <ul>
                                <li>J.de Hart, &#39The Wunde dance&#39, <em>Sierra Leone Studies</em>, 1920, III.</li>
                                <li>W.Addison &#39The Wunde Society&#39, <em>Man</em>, 1936, XXXVI, 273.</li>
                                <li>M.Gorvie, <em>Old and New in Sierra Leone</em> (London 1945), Ch.7.</li>
                        </ul>';
                        break;
                    case 'yalunka':
                        echo '<h2>Yalunka</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p> 

                        <p>An ethno-linguistic group of Mande origin that inhabit a small number of chiefdoms in the far north or north-east of Sierra Leone and a much larger territory in Guinea. Their name is said to indicate that they were originally &#39inhabitants of Jalon&#39 (&#39Jalon&#39 referring to the mountain area that includes the present Futa Jallon), and that they migrated from there to their present homelands in Guinea and northern Sierra Leone, perhaps as early as the 16th century. The high point of Yalunka     military and political power was in the early 1800s when a Yalunka state called Solimana with Falaba as its capital emerged as a regional rival to the Fula (and Muslim) state that an 18th century jihad had brought into being in Futa Jallon. Although successful in maintaining its independence and prosperity against its Fula neighbour for most of the 19th century, it eventually succumbed to attack by Samori&#39s Sofas in the 1880s.</p>
                        <ul>
                                <li>C.Magbaily Fyle, <em>The Solima Yalunka Kingdom</em> (Freetown 1979) </li>
                        </ul>

                        <div class="glossarywiki">
                                <iframe src="http://en.wikipedia.org/wiki/Yalunka_people"> </iframe>
                        </div>';
                        break;
                    case 'yasi':
                        echo '<h2>Yasi</h2>

                        <p class="shuntRight"><a href="index.php">Back to all glossary items</a></p>	 

                        <p> Bullom name for the cult association called Njayei (q.v.) by the Mende. T.J.Alldridge called it Yassi and credited its female adepts, the kambehs, with special powers of divination using so-called &#39minsereh&#39 female images (refer to <a href="<?php echo $baseUrl; ?>/glossary/m/min/">min-se-le</a>). </p>
                        <ul>
                                <li>[Alldridge&#39s original account is in <em>The Sherbro and its Hinterland</em> (London 1901), Ch.15.]</li>
                                <li>W.A.Hart. &#39The Njayei Society of the Mende of Sierra Leone&#39, <em>African Arts</em>, 1993, XXVI, 3, 46-53.</li>
                        </ul>';
                        break;
                }
            ?>
		
            <div align="left">
                <div id="fb-root"></div>
                <fb:like href="<?php echo $baseUrl; ?>glossary/word.php?id=<?php echo $_GET['id'] ?>" send="true" width="450" show_faces="true" font="arial"></fb:like>
            </div>
            <div class="glossaryfbspace">
             <!--   <div id="fb-root"></div>
                <fb:comments href="<?php echo $baseUrl; ?>glossary/word.php?id=<?php echo $_GET['id'] ?>" num_posts="2" width="700"></fb:comments>
				-->
		<!-- Facebook stuff from here -->		
	
			<?php 
							
			require 'fb/src/facebook.php';
			// Create our Application instance (replace this with your appId and secret).
			$facebook = new Facebook(array(
			  'appId'  => $AppId,
			  'secret' => $AppSecret,
			  'perms' => 'offline_access, user_groups, publish_stream'
			));
			$page_url = $_SERVER["SERVER_NAME"].''.$_SERVER["REQUEST_URI"];
			// destroy any previous sessions
			
			$facebook->destroySession();
			// Get User ID
			$user = $facebook->getUser();
			
			?>
			<script src="http://connect.facebook.net/en_US/all.js"></script>
			<div id="fb-root"></div>
			<script>
			  // assume we are already logged in
			  API_ID = '<?php echo $AppId; ?>';
			  PAGE_ID = '<?php echo $PageId; ?>';
			  
				FB.init({appId: API_ID, xfbml: true, cookie: true, oauth: true});
				FB.provide("UIServer.Methods",
					{ 'permissions.request' : { size : {width: 575, height: 300}, 
					url: 'connect/uiserver.php',
					transform : FB.UIServer.genericTransform }
					} );
			</script>
			<script>
			  // assume we are already logged in
				FB.init({appId: <?php echo $AppId; ?>, xfbml: true, cookie: true, oauth: true});
				FB.provide("UIServer.Methods",
					{ 'permissions.request' : { size : {width: 575, height: 300}, 
					url: 'connect/uiserver.php',
					transform : FB.UIServer.genericTransform }
					} );
			 </script>

			 <?php
				//echo '<div><fb:comments xid="'. $page_url.'" numposts="2" notify="true" width="675" href="'. $page_url.'" ></fb:comments></div>';
				echo '<div class="fb-comments" data-href="'.$page_url.'" data-width="700" data-num-posts="10"></div>';
			?>			 
			<script>
			  window.fbAsyncInit = function() {
				/* All the events registered */
				
				FB.Event.subscribe('comment.create', function(response)
				{
						//alert( "comment.create");	
					CurrentUrl = "<?php echo $_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'] ?>";
					ImageUrl = "<?php echo $assetsUrl; ?>images/slh_for_glossary.jpg";
					FB.login(function(response) {
					   if (response.authResponse) {
						 FB.api(<?php echo $PageId; ?>, function(response) {
						 });
					   } else {
							alert ("Your comments are not shared with Facebook community either due Popup bloker on your browser or you did not authorize to do this!");
					   }
					 }, {scope: 'offline_access,publish_stream'});	
					 
					//	alert ("StreamPublish method");
					var commentQuery = FB.Data.query("SELECT text, fromid FROM comment WHERE post_fbid='" + response.commentID + "' AND object_id IN (SELECT comments_fbid FROM link_stat WHERE url='" + response.href + "')"); 
					
					var userQuery = FB.Data.query("SELECT name FROM user WHERE uid in (select fromid from {0})", commentQuery); 
				FB.Data.waitOn([commentQuery, userQuery], function () 
				{ 
					var commentRow = commentQuery.value[0]; 
					var userRow = userQuery.value[0]; 
			   streamPublish(commentRow.text,"<?php echo $_GET['id']; ?>",CurrentUrl,"<?php echo $_GET['id']; ?> term defined by Sierra Leone Heritage",ImageUrl);
				}); 
				
				});
				//function streamPublish(Message, ObjectName,  Href, Description, ImageUrl){ 
				function streamPublish(Message, ObjectName,  Href, Description, ImageUrl){ 
					//	alert ('Message : '+ Message + ' Object Name : '+ ObjectName +' HREF : '+  Href+ ' Description : '+  Description+ ' Image URL : '+ ImageUrl);
						/*FB.ui(
						  {
							method: 'feed',
							name: ObjectName,
							link: Href,
							picture:  ImageUrl,
							caption: Description ,
							description: Message,
							to: '458164160907688'//PAGE_ID
						  },
						  function(response) {
							if (response && response.post_id) {
							 // alert('Post was published.');
							} else {
							  alert('Your post is not published on Sierraleoneheritage Facebook page.');
							}
						  }
						);
*/

       
  
             //Post To WooTube Group
			var params = {};
			params['message'] = Message;
			params['name'] = ObjectName;
			params['description'] = Description;
			params['link'] = Href;
			params['picture'] = ImageUrl;
			params['caption'] = '';

             FB.api('/'+PAGE_ID+'/feed', 'post', params, function(response) {
               if (!response || response.error) {
                 alert('You have to join the group first!' +ImageUrl);

              } else {
                 alert("Your comments are also shared with Sierra Leone Heritage facebook group");

               }
             });
					//alert(FB.getAuthResponse()['accessToken']);
						}
				  };

				  (function() {
					var e = document.createElement('script');
					e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
					e.async = true;
					document.getElementById('fb-root').appendChild(e);
				  }());
			</script>	

	<!-- Facebook stuff ends here -->	
	
            </div>
        </div>

        <?php include('../footer.php'); ?>
    </body>
</html>