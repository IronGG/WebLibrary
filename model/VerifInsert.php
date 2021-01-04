<?php
/**
 * ETML
 * Auteur : Laetitia Guidetti et Adrian Barreira
 * Date: Septembre à Décembre 2020
 * Description : Classe vérifiant les données entrées pour un livre
 */


include_once 'CatalogRepository.php';
class VerifInsert
{

  /**
   * Verifie les données inserée
   *
   * @return void
   */
  public function VerifData()
  {
    $catalogRepository = new CatalogRepository();
    $correctData = TRUE;

    // Vérifie que le nom du manga ne soit pas vide, il n'y a pas de vérification du type caractères entré car certain manga utilise des caractères très spécial
    if (!strlen($_POST['mangaName']) > 0) {
      $correctData = FALSE;
      $_SESSION["Error"][] = "Le nom du manga ne doit pas être vide";
    }

    // Verifie que le nom de l'auteur ne soit pas vide et qu'il respect le regex
    if (!strlen($_POST['authorName']) > 0 || !preg_match("/^[A-Za-z\-_ ’'‘ÆÐƎƏƐƔĲŊŒẞÞǷȜæðǝəɛɣĳŋœĸſßþƿȝĄƁÇĐƊĘĦĮƘŁØƠŞȘŢȚŦŲƯY̨Ƴąɓçđɗęħįƙłøơşșţțŧųưy̨ƴÁÀÂÄǍĂĀÃÅǺĄÆǼǢƁĆĊĈČÇĎḌĐƊÐÉÈĖÊËĚĔĒĘẸƎƏƐĠĜǦĞĢƔáàâäǎăāãåǻąæǽǣɓćċĉčçďḍđɗðéèėêëěĕēęẹǝəɛġĝǧğģɣĤḤĦIÍÌİÎÏǏĬĪĨĮỊĲĴĶƘĹĻŁĽĿʼNŃN̈ŇÑŅŊÓÒÔÖǑŎŌÕŐỌØǾƠŒĥḥħıíìiîïǐĭīĩįịĳĵķƙĸĺļłľŀŉńn̈ňñņŋóòôöǒŏōõőọøǿơœŔŘŖŚŜŠŞȘṢẞŤŢṬŦÞÚÙÛÜǓŬŪŨŰŮŲỤƯẂẀŴẄǷÝỲŶŸȲỸƳŹŻŽẒŕřŗſśŝšşșṣßťţṭŧþúùûüǔŭūũűůųụưẃẁŵẅƿýỳŷÿȳỹƴźżžẓ]+$/", $_POST['authorName'])) {
      $correctData = FALSE;
      $_SESSION["Error"][] = "Le nom de l'auteur ne doit pas être vide et comprendre uniquement des caractères habituelles";
    }

    // Verifie que le nom de l'editeur ne soit pas vide et qu'il respect le regex
    if (!strlen($_POST['editeurName']) > 0 || !preg_match("/^[A-Za-z\-_ ’'‘ÆÐƎƏƐƔĲŊŒẞÞǷȜæðǝəɛɣĳŋœĸſßþƿȝĄƁÇĐƊĘĦĮƘŁØƠŞȘŢȚŦŲƯY̨Ƴąɓçđɗęħįƙłøơşșţțŧųưy̨ƴÁÀÂÄǍĂĀÃÅǺĄÆǼǢƁĆĊĈČÇĎḌĐƊÐÉÈĖÊËĚĔĒĘẸƎƏƐĠĜǦĞĢƔáàâäǎăāãåǻąæǽǣɓćċĉčçďḍđɗðéèėêëěĕēęẹǝəɛġĝǧğģɣĤḤĦIÍÌİÎÏǏĬĪĨĮỊĲĴĶƘĹĻŁĽĿʼNŃN̈ŇÑŅŊÓÒÔÖǑŎŌÕŐỌØǾƠŒĥḥħıíìiîïǐĭīĩįịĳĵķƙĸĺļłľŀŉńn̈ňñņŋóòôöǒŏōõőọøǿơœŔŘŖŚŜŠŞȘṢẞŤŢṬŦÞÚÙÛÜǓŬŪŨŰŮŲỤƯẂẀŴẄǷÝỲŶŸȲỸƳŹŻŽẒŕřŗſśŝšşșṣßťţṭŧþúùûüǔŭūũűůųụưẃẁŵẅƿýỳŷÿȳỹƴźżžẓ]+$/", $_POST['editeurName'])) {
      $correctData = FALSE;
      $_SESSION["Error"][] = "Le nom de l'éditeur ne doit pas être vide et comprendre uniquement des caractères habituelles";
    }

    // Verifie que l'année soit comprise entre 1900 et aujourd'hui
    if (!$_POST['year'] >= 1900 && !$_POST['year'] <= date("Y")) {
      $correctData = FALSE;
      $_SESSION["Error"][] = "Veuillez écrire une date entre 1900 et aujourd'hui";
    }

    // Verifie que le nombre de chapitre soit suppérieur à 0
    if (!$_POST['chapter'] > 0) {
      $correctData = FALSE;
      $_SESSION["Error"][] = "Veuillez inscrire un nombre de chapitres plus grand que 0";
    }

    // Verifie que le résumé ne soit pas vide
    if (!strlen($_POST['resume']) > 0) {
      $_SESSION["Error"][] = "Le résumé ne doit pas être vide";
      $correctData = FALSE;
    }

    // Verifie qu'une image de couverture soit données
    if ($_FILES["cover"]["type"] != "image/jpeg") {
      $_SESSION["Error"][] = "La couverture doit être une image jpeg";
      $correctData = FALSE;
    }

    // Verifie qu'un extrait soit données ou vide
    if ($_FILES["extrait"]["type"] != "application/pdf" && $_FILES["extrait"]["type"] != NULL) {
      $_SESSION["Error"][] = "L'extrait doit être au format pdf";
      $correctData = FALSE;
    }

    //Test si les données entrée sont conforme
    if ($correctData) {
      $sourceIMG = $_FILES["cover"]["tmp_name"];
      $destinationIMG = "resources/images/" . date("YmdHis") . $_FILES["cover"]["name"];
      move_uploaded_file($sourceIMG, $destinationIMG);
      $sourcePDF = $_FILES["extrait"]["tmp_name"];
      $destinationPDF = "resources/PDF/" . date("YmdHis") . $_FILES["extrait"]["name"];
      if($_FILES["extrait"]["type"] == NULL)
      {
        $extract = "noExtract.pdf";
      }
      else
      {
        $extract = date("YmdHis") . $_FILES["extrait"]["name"];
      }
      move_uploaded_file($sourcePDF, $destinationPDF);
      $catalogRepository->insertBook(date("YmdHis") . $_FILES["cover"]["name"], $_POST["mangaName"], $_POST["chapter"],$extract, $_POST["resume"], $_POST["authorName"], $_POST["editeurName"], $_POST["year"], $_SESSION["username"], $_POST["chooseCate"]);
      header("Location: index.php?controller=home&action=index");
    }
  }
}
