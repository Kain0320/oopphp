# 🚀 [base e-shop]

[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-blue.svg)](https://php.net/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

Jednoduchý a robustní základ pro webovou aplikaci (např. e-shop), vytvořený na zelené louce v čistém objektovém PHP. Projekt aktuálně využívá základy MVC architektury a centrální směrování (Router).

## ✨ Klíčové vlastnosti

* **Vlastní OOP struktura:** Systém je postaven na vlastních, znovupoužitelných třídách (Databáze, Uživatel, Sessions).
* **Připraveno na MVC:** Logika (zpracování dat) a šablony (vzhled) jsou odděleny pro snazší údržbu.
* **Bezpečnost na prvním místě:**
    * Připojení k databázi využívá moderní vrstvu **PDO**.
    * Ochrana proti SQL Injection díky důslednému využívání **Prepared Statements** s parametry (vlastní metoda `run()` ve třídě DB).
    * Ochrana hesel (zatím připraveno na hashování).
    * Ochrana proti Session Fixation pomocí `session_regenerate_id()`.
* **Automatické načítání tříd:** Žádné zbytečné opakování kódu. Všechny třídy se načítají automaticky díky `spl_autoload_register`.
* **Centrální Router:** Všechny requesty by měly procházet přes `index.php?url=...` (v aktuální fázi je implementace Front Controlleru v procesu dokončování).

---

## 🛠️ Technologie

* **Backend:** PHP (Objektově orientované)
* **Databáze:** MySQL / MariaDB (komunikace přes PDO)
* **Design:** Čisté HTML/CSS (připraveno na snadné nasazení frameworků jako Bootstrap/Tailwind)

---

## ⚙️ Co potřebuješ k běhu (Prerekvizity)

Pro lokální vývoj potřebuješ mít na počítači nainstalováno:
* [PHP](https://www.php.net/downloads) (verze 7.4 nebo novější)
* [MySQL](https://www.mysql.com/) nebo MariaDB
* Lokální vývojové prostředí, například [MAMP](https://www.mamp.info/) (Mac), XAMPP (Windows/Linux) nebo běžící vestavěný PHP server.

---

## 🚀 Instalace a lokální spuštění

Následuj tyto kroky, abys projekt rozjel na svém počítači:

### 1. Klonování repozitáře
Stáhni si projekt do svého lokálního prostředí pomocí Gitu:
```bash
git clone [[https://github.com/](https://github.com/)[TvojeJmeno]/[NazevRepozitare].git](https://github.com/Kain0320/oopphp.git)
cd oopphp
