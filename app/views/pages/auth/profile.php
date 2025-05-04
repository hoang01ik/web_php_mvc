
<div class="container mt-5">
    <h2 class="text-center">Thông Tin Cá Nhân</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Flash Message -->
            <?php if ($flash = getFlash()): ?>
                <div class="alert <?= $flash['type'] === 'success' ? 'alert-success' : 'alert-danger'; ?>">
                    <?= htmlspecialchars($flash['message']); ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Xin chào, <?= htmlspecialchars($_SESSION['user']['ten']) ?>!</h5>
                    <p><strong>Tên đăng nhập:</strong> <?= htmlspecialchars($_SESSION['user']['tai_khoan']) ?></p>
                    <p><strong>Vai trò:</strong> <?= htmlspecialchars($_SESSION['user']['quyen']) ?></p>
                    <a href="/logout" class="btn btn-danger w-100">Đăng Xuất</a>
                </div>
            </div>
        </div>
    </div>
    
</div>

