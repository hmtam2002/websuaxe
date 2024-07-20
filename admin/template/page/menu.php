<nav id="sidebar" class="col-md-3 h-100 col-lg-2 d-md-block bg-light sidebar collapse overflow-auto">
    <div class="position-sticky" style="
    padding-bottom: 100px;">
        <ul class="nav flex-column">
            <!-- <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="?com=home&act=dashboard">
                    <i class="bi bi-house-door me-2"></i> Trang chủ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center collapsed"
                    data-bs-toggle="collapse" href="#submenuSach" role="button" aria-expanded="false"
                    aria-controls="submenuSach">
                    <span><i class="bi bi-book me-2"></i> Quản lý sách</span>
                    <i class="bi bi-chevron-down arrow">
                    </i>
                </a>
                <div class="collapse" id="submenuSach">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center " href="
                                ?com=book&act=list">
                                <i class="bi bi-book-half me-2"></i> Sách
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="?com=author&act=list">
                                <i class="bi bi-person me-2"></i> Tác giả
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center " href="?com=genre&act=list">
                                <i class="bi bi-tags me-2"></i> Thể loại
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center collapsed"
                    data-bs-toggle="collapse" href="#submenuVanphongpham" role="button" aria-expanded="false"
                    aria-controls="submenuVanphongpham">
                    <span><i class="bi bi-pen me-2"></i> Văn phòng phẩm</span>
                    <i class="bi bi-chevron-down arrow">
                    </i>
                </a>
                <div class="collapse" id="submenuVanphongpham">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="?com=stationery&act=list">
                                <i class="bi bi-pencil-square me-2"></i> Sản phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center " href="?com=origin&act=list">
                                <i class="bi bi-globe me-2"></i> Xuất xứ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center " href="?com=brand&act=list">
                                <i class="bi bi-tags me-2"></i> Thương hiệu
                            </a>
                        </li>
                    </ul>
                </div>
            </li> -->
            <?php $baiviet = $com == 'news' || $com == 'cat' || $com == 'policy'; ?>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center <?= !$baiviet ? 'collapsed' : '' ?>"
                    data-bs-toggle="collapse" href="#submenuBaiviet" role="button"
                    aria-expanded="<?= $baiviet ? "true" : "false" ?>" aria-controls="submenuBaiviet">
                    <span><i class="bi bi-journal me-2"></i> Quản lý bài viết</span>
                    <i class="bi bi-chevron-down arrow">
                    </i>
                </a>
                <div class="collapse <?= $baiviet ? "show" : "" ?>" id="submenuBaiviet">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($com == 'news' && $act == 'gioithieu') ? 'active' : '' ?>"
                                href="?com=news&act=gioithieu">
                                <i class="bi bi-newspaper me-2"></i> Giới thiệu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($com == 'cat' && $act == 'list') ? 'active' : '' ?>"
                                href="?com=cat&act=list">
                                <i class="bi bi-file-earmark-text me-2"></i> Danh mục cấp 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= ($com == 'news' && $act == 'list') ? 'active' : '' ?>"
                                href="?com=news&act=list">
                                <i class="bi bi-file-earmark-text me-2"></i> Bài viết
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= $com == 'policy' ? 'active' : '' ?>"
                                href="?com=policy&act=list">
                                <i class="bi bi-file-earmark-text me-2"></i> Chính sách
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php $hinhanh = $com == 'slider' || $com == 'banner' || $com == 'logo' || $com == 'favicon'; ?>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center <?= !$hinhanh ? 'collapsed' : '' ?>"
                    data-bs-toggle="collapse" href="#submenuHinhanh" role="button"
                    aria-expanded="<?= $hinhanh ? 'true' : 'false' ?>" aria-controls="submenuHinhanh">
                    <span><i class="bi bi-images me-2"></i> Quản lý hình ảnh</span>
                    <i class="bi bi-chevron-down arrow">
                    </i>
                </a>
                <div class="collapse <?= $hinhanh ? 'show' : '' ?>" id="submenuHinhanh">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= $com == 'slider' ? 'active' : '' ?>"
                                href="?com=slider&act=list">
                                <i class="bi bi-card-image me-2"></i> Slider
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= $com == 'banner' ? 'active' : '' ?>"
                                href="?com=banner&act=list">
                                <i class="bi bi-card-image me-2"></i> Hình giới thiệu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= $com == 'logo' ? 'active' : '' ?>"
                                href="?com=logo&act=update">
                                <i class="bi bi-card-image me-2"></i> Logo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?= $com == 'favicon' ? 'active' : '' ?>"
                                href="?com=favicon&act=update">
                                <i class="bi bi-card-image me-2"></i> Favicon
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center <?= $com == 'user' ? 'active' : '' ?>"
                    href="?com=user&act=update">
                    <i class="bi bi-person me-2"></i> Tài khoản
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center <?= $com == 'setting' ? 'active' : '' ?>"
                    href="?com=setting&act=update">
                    <i class="bi bi-gear me-2"></i> Cài đặt
                </a>
            </li>
        </ul>
    </div>
</nav>