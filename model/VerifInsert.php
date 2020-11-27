<?php

if(isset($_POST['btnSubmit']))
{
  $correctData = TRUE;
  if(!strlen($_POST['mangaName']) > 0)
  {
    $correctData = FALSE;
  }
  if(!strlen($_POST['authorName']) > 0 || !preg_match("/^[A-Za-z\-_ ’'‘ÆÐƎƏƐƔĲŊŒẞÞǷȜæðǝəɛɣĳŋœĸſßþƿȝĄƁÇĐƊĘĦĮƘŁØƠŞȘŢȚŦŲƯY̨Ƴąɓçđɗęħįƙłøơşșţțŧųưy̨ƴÁÀÂÄǍĂĀÃÅǺĄÆǼǢƁĆĊĈČÇĎḌĐƊÐÉÈĖÊËĚĔĒĘẸƎƏƐĠĜǦĞĢƔáàâäǎăāãåǻąæǽǣɓćċĉčçďḍđɗðéèėêëěĕēęẹǝəɛġĝǧğģɣĤḤĦIÍÌİÎÏǏĬĪĨĮỊĲĴĶƘĹĻŁĽĿʼNŃN̈ŇÑŅŊÓÒÔÖǑŎŌÕŐỌØǾƠŒĥḥħıíìiîïǐĭīĩįịĳĵķƙĸĺļłľŀŉńn̈ňñņŋóòôöǒŏōõőọøǿơœŔŘŖŚŜŠŞȘṢẞŤŢṬŦÞÚÙÛÜǓŬŪŨŰŮŲỤƯẂẀŴẄǷÝỲŶŸȲỸƳŹŻŽẒŕřŗſśŝšşșṣßťţṭŧþúùûüǔŭūũűůųụưẃẁŵẅƿýỳŷÿȳỹƴźżžẓ]+$/", $_POST['authorName']))
  {
    $correctData = FALSE;
  }
  if(!strlen($_POST['editeurName']) > 0 || !preg_match("/^[A-Za-z\-_ ’'‘ÆÐƎƏƐƔĲŊŒẞÞǷȜæðǝəɛɣĳŋœĸſßþƿȝĄƁÇĐƊĘĦĮƘŁØƠŞȘŢȚŦŲƯY̨Ƴąɓçđɗęħįƙłøơşșţțŧųưy̨ƴÁÀÂÄǍĂĀÃÅǺĄÆǼǢƁĆĊĈČÇĎḌĐƊÐÉÈĖÊËĚĔĒĘẸƎƏƐĠĜǦĞĢƔáàâäǎăāãåǻąæǽǣɓćċĉčçďḍđɗðéèėêëěĕēęẹǝəɛġĝǧğģɣĤḤĦIÍÌİÎÏǏĬĪĨĮỊĲĴĶƘĹĻŁĽĿʼNŃN̈ŇÑŅŊÓÒÔÖǑŎŌÕŐỌØǾƠŒĥḥħıíìiîïǐĭīĩįịĳĵķƙĸĺļłľŀŉńn̈ňñņŋóòôöǒŏōõőọøǿơœŔŘŖŚŜŠŞȘṢẞŤŢṬŦÞÚÙÛÜǓŬŪŨŰŮŲỤƯẂẀŴẄǷÝỲŶŸȲỸƳŹŻŽẒŕřŗſśŝšşșṣßťţṭŧþúùûüǔŭūũűůųụưẃẁŵẅƿýỳŷÿȳỹƴźżžẓ]+$/", $_POST['editeurName']))
  {
    $correctData = FALSE;
  }
  if(!$_POST['year'] >= 1900)
  {
    $correctData = FALSE;
  }
  if(!$_POST['chapter'] > 0)
  {
    $correctData = FALSE;
  }
  if(!strlen($_POST['resume']) > 0)
  {
    $correctData = FALSE;
  }
  if($_FILES["cover"]["type"] != "image/jpeg")
  {
    $correctData = FALSE;
  }
  if($_FILES["extrait"]["type"] != "application/pdf")
  {
    $correctData = FALSE;
  }

  if($correctData)
  {
    $sourceIMG = $_FILES["cover"]["tmp_name"];
    $destinationIMG = "resources/images/" . date("YmdHis") . $_FILES["cover"]["name"];
    move_uploaded_file($sourceIMG, $destinationIMG);
    $sourcePDF = $_FILES["extrait"]["tmp_name"];
    $destinationPDF = "resources/PDF/" . date("YmdHis") . $_FILES["extrait"]["name"];
    move_uploaded_file($sourcePDF, $destinationPDF);
    echo "Donnée récupérée";
    $catalogRepository->insertBook(date("YmdHis") . $_FILES["cover"]["name"], $_POST["mangaName"], $_POST["chapter"], date("YmdHis") . $_FILES["extrait"]["name"], $_POST["resume"], $_POST["authorName"], $_POST["editeurName"], $_POST["year"], $_SESSION["username"], $_POST["chooseCate"]);
    
  }
  else
  {
    echo "Donnée refusée";
  }
}
?>