<?PHP

echo '<table border="1">';
echo '<tr><th>Variabelnamn</th><th>Variabelvärde</th></tr>';

foreach($_SERVER as $var_name => $var_value) {
    echo '<tr>';
    echo('<td>' . ($var_name) . '</td>');
    echo('<td>' . ($var_value) . '</td>');
    echo('</tr>');
}
echo '</table>';
?>