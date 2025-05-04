<?php if ($flash = getFlash()): ?>
    <div class="alert <?= $flash['type'] === 'success' ? 'alert-success' : 'alert-danger'; ?>">
        <?= htmlspecialchars($flash['message']); ?>
    </div>
<?php endif; ?>
