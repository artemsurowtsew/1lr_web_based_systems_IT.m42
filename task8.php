<?php
header("Content-Type: text/html; charset=utf-8");

class CountryManager {
    private $filePath;

    // шлях до файлу
    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    // Метод для додавання запису до CSV файлу
    public function addCountry($area, $population, $language, $capital) {
        $file = fopen($this->filePath, 'a'); // відкриваємо файл у режимі додавання
        fputcsv($file, [$area, $population, $language, $capital]); // записуємо новий запис
        fclose($file); // закриваємо файл
    }

    // Метод для читання всіх записів з CSV файлу
    public function getCountries() {
        $countries = [];
        if (($file = fopen($this->filePath, 'r')) !== false) {
            $headers = fgetcsv($file);

            while (($data = fgetcsv($file)) !== false) {
                $countries[] = [
                    'area' => $data[0],
                    'population' => $data[1],
                    'language' => $data[2],
                    'capital' => $data[3],
                ];
            }
            fclose($file);
        }
        return $countries;
    }

    // Метод для виведення всіх записів на екран
    public function showCountries() {
        $countries = $this->getCountries();
        foreach ($countries as $country) {
            echo "<p>Area: {$country['area']}, Population: {$country['population']}, Language: {$country['language']}, Capital: {$country['capital']}</p>";
        }
    }

    // Метод для пошуку країни за столицею
    public function searchCountryByCapital($capital) {
        $countries = $this->getCountries();
        foreach ($countries as $country) {
            if ($country['capital'] === $capital) {
                return $country;
            }
        }
        return null;
    }
}


$countryManager = new CountryManager('task8.csv');

// Додаємо нові країни у файл
$countryManager->addCountry('9 984 670 км²', '38 мільйона', 'Англійська', 'Оттава');
$countryManager->addCountry('1 564 116 км²', '19 мільйона', 'Румунська', 'Бухарест');

// Виводимо всі країни з файлу
$countryManager->showCountries();

// Шукаємо країну за столицею
$searchedCountry = $countryManager->searchCountryByCapital('Київ');
if ($searchedCountry) {
    echo "<p>Country with capital Київ: Area: {$searchedCountry['area']}, Population: {$searchedCountry['population']}, Language: {$searchedCountry['language']}</p>";
} else {
    echo "<p>No country with capital Київ found.</p>";
}

?>
