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
        <!-- Prepositions Section -->
        <li>
            <h6 class="dropdown-header">Prepositions</h6>
        </li>
        <li><a class="dropdown-item" href="/grammar/prepositions/beginner/prepbasic.php">Beginner (A1-A2)</a></li>
        <li><a class="dropdown-item" href="/grammar/prepositions/intermediate/intermepreps.php">Intermediate (B1-B2)</a></li>
        <li><a class="dropdown-item" href="/grammar/prepositions/advanced/advanprep.php">Advanced (C1-C2)</a></li>

        <li>
            <hr class="dropdown-divider">
        </li>

        <!-- Tense Forms Section -->
        <li>
            <h6 class="dropdown-header">Tense Forms</h6>
        </li>
        <li><a class="dropdown-item" href="/grammar/tense-forms/beginner/tenses-basic.php">Beginner (A1-A2)</a></li>
        <li><a class="dropdown-item" href="/grammar/tense-forms/intermediate/tenses-intermediate.php">Intermediate (B1-B2)</a></li>
        <li><a class="dropdown-item" href="/grammar/tense-forms/advanced/tenses-advanced.php">Advanced (C1-C2)</a></li>
    </ul>
</li>
