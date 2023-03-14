<?

Function sautligne($fic)
{
  $lachaine=str_replace(".","<br>",$fic);
  return $lachaine;

} 
Function sautpoint($fic)
{
  $lachaine=str_replace(",","<br>",$fic);
  return $lachaine;

}
Function sautlignes($fic)
{
  $lachaine=str_replace("--","<br>",$fic);
  return $lachaine;

} 
?>