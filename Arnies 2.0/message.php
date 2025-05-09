<?php if (isset($_SESSION['error'])) { ?>
    <div id="message-container">
        <h3 class="error">
            <?= $_SESSION['error'] ?>
            <button id="message-close-btn" onclick="closeMessageContainer()">X</button>
        </h3>
    </div>
    <?php
    $_SESSION['error'] = null;
} ?>
<?php if (isset($_SESSION['success'])) { ?>
    <div id="message-container">
        <h3 class="success">
            <?= $_SESSION['success'] ?>
            <button id="message-close-btn" onclick="closeMessageContainer()">X</button>
        </h3>
    </div>
    <?php
    $_SESSION['success'] = null;
} ?>

<script>
    function closeMessageContainer() {
        document.getElementById('message-container').style.display = 'none';
    }
</script>