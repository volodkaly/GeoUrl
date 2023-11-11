<?php

$products = [
    "Ноутбук Dell XPS 13",
    "Смартфон iPhone 13 Pro",
    "Телевизор Samsung QLED Q70",
    "Наушники Sony WH-1000XM4",
    "Кофемашина DeLonghi Magnifica",
    "Фотоаппарат Canon EOS 5D Mark IV",
    "Планшет iPad Pro",
    "Пылесос Dyson V11",
    "Смарт-часы Apple Watch Series 7",
    "Геймпад Xbox Series X",
    "Холодильник Bosch Serie 4",
    "Монитор ASUS ROG Swift PG279Q",
    "Клавиатура Logitech G Pro X",
    "Мышь SteelSeries Rival 600",
    "Принтер HP LaserJet Pro",
    "Bluetooth-колонка JBL Charge 4",
    "Микроволновая печь Panasonic NN-SN966S",
    "Гитара Fender Stratocaster",
    "Детский велосипед Schwinn Koen",
    "Видеокамера GoPro Hero 10",
    "Блендер Vitamix E310",
    "Автомобильные шины Michelin Pilot Sport 4S",
    "Сковорода T-fal E76507",
    "Массажное кресло Real Relax Favor-03",
    "Электрический духовой шкаф Breville BOV845BSS",
    "Скейтборд Boosted Mini X",
    "Велосипедный шлем Giro Syntax MIPS",
    "Мыльница Xiaomi Mijia",
    "Увлажнитель воздуха Honeywell HCM350B",
    "Смартфон Google Pixel 6",
    "Ноутбук ASUS ROG Zephyrus G14",
    "Гладильная доска Brabantia",
    "Акустическая гитара Yamaha F335",
    "Кофеварка Keurig K-Elite",
    "Умные лампы Philips Hue",
    "Складной столик для пикника",
    "Компьютерное кресло DXRacer Formula Series",
    "Вентилятор Dyson Pure Cool TP04",
    "Барбекю-гриль Weber Original Kettle Premium",
    "Смарт-термостат Nest Learning Thermostat",
    "Чайник Breville BKE820XL",
    "Электрический барный стул Topo Comfort",
    "ěqířá Osprey bAtmos AG 65",
    "ěéčéářМонопод для селфи Yoozon",
    "čaj Водонагреватель Bosch Tronic 3000 T",
    "žaluzie Бинокль Nikon Prostaff 7S",
    "Детская коляска Baby Jogger City Mini GT2",
    "Баскетбольное кольцо Spalding NBA",
    "Робот-пылесос iRobot Roomba 981",
    "Велосипедный насос Lezyne Steel Floor Drive"
];

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $suggestions = [];

    foreach ($products as $product) {
        if (mb_stripos($product,$query) === 0) {
            $suggestions[] = $product;
        }
    }

    echo json_encode($suggestions);
}