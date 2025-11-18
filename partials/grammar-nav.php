<?php
// filepath: partials/grammar-nav.php
// Grammar dropdown navigation - used in navbar and footer
?>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle <?php echo (strpos($_SERVER['PHP_SELF'], '/grammar/') !== false) ? 'text-decoration-underline' : 'text-decoration-none'; ?>"
        href="#"
        id="grammarDropdown"
        role="button"
        data-bs-toggle="dropdown"
        aria-expanded="false">
        Grammar
    </a>
    <ul class="dropdown-menu" aria-labelledby="grammarDropdown">
        <li><a class="dropdown-item" href="/grammar/prepositions/beginner/prepbasic.php">Prepositions A1-A2</a></li>
        <li><a class="dropdown-item" href="/grammar/prepositions/intermediate/intermepreps.php">Prepositions B1-B2</a></li>
        <li><a class="dropdown-item" href="/grammar/prepositions/advanced/advanprep.php">Prepositions C1-C2</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item disabled" href="#">More coming soon...</a></li>
    </ul>
</li>
