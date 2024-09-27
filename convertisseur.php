<?php
class convertisseur
{
    public function __construct($t, $from)
    {
        // Appel à l'API pour récupérer les conversions
        $result = file_get_contents("https://dwf.sytes.net/convertisseur-temperatures/services/index.php?service=s_ct&t={$t}&from={$from}");
        $data = json_decode($result, true);

        // Vérifier que la réponse contient des données
        if (!empty($data)) {
            // Filtrer uniquement les unités valides (C, F, K)
            $valid_units = [
                'C' => 'Celsius',
                'F' => 'Fahrenheit',
                'K' => 'Kelvin'
            ];

            // Afficher le titre du résultat
            echo "<div class='card mt-4 p-3'>";
            echo "<h3 class='text-center mb-4'>Résultats de la conversion</h3>";
            
            // Affichage des résultats centrés
            echo "<div class='row justify-content-center text-center'>";
            foreach ($data as $unite => $details) {
                // Vérifier si l'unité fait partie des unités valides
                if (array_key_exists($unite, $valid_units)) {
                    echo "<div class='col-md-4 mb-4'>"; // Chaque résultat dans une colonne
                    echo "<div class='card p-3 shadow-sm'>"; // Encadrer chaque résultat avec une carte Bootstrap
                    echo "<h5 class='card-title'><strong>Température en {$valid_units[$unite]} ({$unite})</strong></h5>"; // Détail de l'unité avec nom complet et abréviation
                    
                    // Vérifier si les données sont sous forme de tableau (contenant 'value' et 'unit')
                    if (is_array($details) && isset($details['value']) && isset($details['unit'])) {
                        echo "<p class='card-text fs-1'>{$details['value']} °{$details['unit']}</p>"; // Valeur au centre
                    } else {
                        // Si ce n'est pas un tableau, afficher simplement la valeur
                        echo "<p class='card-text fs-1'>{$details} °</p>"; // Valeur au centre
                    }

                    echo "</div>"; // Fin de la carte
                    echo "</div>"; // Fin de la colonne
                }
            }
            echo "</div>"; // Fin de la ligne
            echo "</div>"; // Fin de la carte principale
        } else {
            echo "<div class='alert alert-danger mt-4'>Erreur lors de la récupération des données.</div>";
        }
    }
    
}
?>
