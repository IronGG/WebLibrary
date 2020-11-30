<?php

include_once 'CatalogRepository.php';
class VerifInsert
{
  public function __construct()
  {

  }

  public function VerifData()
  {
    $catalogRepository = new CatalogRepository();
    $correctData = TRUE;
    if (!strlen($_POST['mangaName']) > 0) {
      $correctData = FALSE;
      $_SESSION["Error"][] = "Le nom du manga ne doit pas être vide";
    }
    if (!strlen($_POST['authorName']) > 0 || !preg_match("/^[A-Za-z\-_ ’'‘ÆÐƎƏƐƔĲŊŒẞÞǷȜæðǝəɛɣĳŋœĸſßþƿȝĄƁÇĐƊĘĦĮƘŁØƠŞȘŢȚŦŲƯY̨Ƴąɓçđɗęħįƙłøơşșţțŧųưy̨ƴÁÀÂÄǍĂĀÃÅǺĄÆǼǢƁĆĊĈČÇĎḌĐƊÐÉÈĖÊËĚĔĒĘẸƎƏƐĠĜǦĞĢƔáàâäǎăāãåǻąæǽǣɓćċĉčçďḍđɗðéèėêëěĕēęẹǝəɛġĝǧğģɣĤḤĦIÍÌİÎÏǏĬĪĨĮỊĲĴĶƘĹĻŁĽĿʼNŃN̈ŇÑŅŊÓÒÔÖǑŎŌÕŐỌØǾƠŒĥḥħıíìiîïǐĭīĩįịĳĵķƙĸĺļłľŀŉńn̈ňñņŋóòôöǒŏōõőọøǿơœŔŘŖŚŜŠŞȘṢẞŤŢṬŦÞÚÙÛÜǓŬŪŨŰŮŲỤƯẂẀŴẄǷÝỲŶŸȲỸƳŹŻŽẒŕřŗſśŝšşșṣßťţṭŧþúùûüǔŭūũűůųụưẃẁŵẅƿýỳŷÿȳỹƴźżžẓ]+$/", $_POST['authorName'])) {
      $correctData = FALSE;
      $_SESSION["Error"][] = "Le nom de l'auteur ne doit pas être vide et comprendre uniquement des caractères habituelles";
    }
    if (!strlen($_POST['editeurName']) > 0 || !preg_match("/^[A-Za-z\-_ ’'‘ÆÐƎƏƐƔĲŊŒẞÞǷȜæðǝəɛɣĳŋœĸſßþƿȝĄƁÇĐƊĘĦĮƘŁØƠŞȘŢȚŦŲƯY̨Ƴąɓçđɗęħįƙłøơşșţțŧųưy̨ƴÁÀÂÄǍĂĀÃÅǺĄÆǼǢƁĆĊĈČÇĎḌĐƊÐÉÈĖÊËĚĔĒĘẸƎƏƐĠĜǦĞĢƔáàâäǎăāãåǻąæǽǣɓćċĉčçďḍđɗðéèėêëěĕēęẹǝəɛġĝǧğģɣĤḤĦIÍÌİÎÏǏĬĪĨĮỊĲĴĶƘĹĻŁĽĿʼNŃN̈ŇÑŅŊÓÒÔÖǑŎŌÕŐỌØǾƠŒĥḥħıíìiîïǐĭīĩįịĳĵķƙĸĺļłľŀŉńn̈ňñņŋóòôöǒŏōõőọøǿơœŔŘŖŚŜŠŞȘṢẞŤŢṬŦÞÚÙÛÜǓŬŪŨŰŮŲỤƯẂẀŴẄǷÝỲŶŸȲỸƳŹŻŽẒŕřŗſśŝšşșṣßťţṭŧþúùûüǔŭūũűůųụưẃẁŵẅƿýỳŷÿȳỹƴźżžẓ]+$/", $_POST['editeurName'])) {
      $correctData = FALSE;
      $_SESSION["Error"][] = "Le nom de l'éditeur ne doit pas être vide et comprendre uniquement des caractères habituelles";
    }
    if (!$_POST['year'] >= 1900 && !$_POST['year'] <= date("Y")) {
      $correctData = FALSE;
      $_SESSION["Error"][] = "Veuillez écrire une date entre 1900 et aujourd'hui";
    }
    if (!$_POST['chapter'] > 0) {
      $correctData = FALSE;
      $_SESSION["Error"][] = "Veuillez inscrire un nombre de chapitres plus grand que 0";
    }
    if (!strlen($_POST['resume']) > 0) {
      $_SESSION["Error"][] = "Le résumé ne doit pas être vide";
      $correctData = FALSE;
    }
    if ($_FILES["cover"]["type"] != "image/jpeg") {
      $_SESSION["Error"][] = "La couverture doit être une image jpeg";
      $correctData = FALSE;
    }
    if ($_FILES["extrait"]["type"] != "application/pdf") {
      $_SESSION["Error"][] = "L'extrait doit être au format pdf";
      $correctData = FALSE;
    }

    if ($correctData) {
      $sourceIMG = $_FILES["cover"]["tmp_name"];
      $destinationIMG = "resources/images/" . date("YmdHis") . $_FILES["cover"]["name"];
      move_uploaded_file($sourceIMG, $destinationIMG);
      $sourcePDF = $_FILES["extrait"]["tmp_name"];
      $destinationPDF = "resources/PDF/" . date("YmdHis") . $_FILES["extrait"]["name"];
      move_uploaded_file($sourcePDF, $destinationPDF);
      $catalogRepository->insertBook(date("YmdHis") . $_FILES["cover"]["name"], $_POST["mangaName"], $_POST["chapter"], date("YmdHis") . $_FILES["extrait"]["name"], $_POST["resume"], $_POST["authorName"], $_POST["editeurName"], $_POST["year"], $_SESSION["username"], $_POST["chooseCate"]);
      $_SESSION["Error"][] = "Données enregistrées";
      $_SESSION["Valid"] = FALSE;
    }
  }
}
