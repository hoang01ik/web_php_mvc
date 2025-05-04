<?php


function fixInput($data)
{
    if (is_string($data)) {
        $data = str_replace("\\", "\\\\", $data);
        $data = str_replace("\'", "\\\'", $data);
    }
    return $data;
}

function getGet($key)
{
    return isset($_GET[$key]) ? fixInput($_GET[$key]) : '';
}

function getPost($key)
{
    return isset($_POST[$key]) ? fixInput($_POST[$key]) : '';
}

function getRequest($key)
{
    return isset($_REQUEST[$key]) ? fixInput($_REQUEST[$key]) : '';
}

function getCookie($key)
{
    return isset($_COOKIE[$key]) ? fixInput($_COOKIE[$key]) : '';
}

function getSession($key)
{
    return isset($_SESSION[$key]) ? fixInput($_SESSION[$key]) : '';
}

function getCookie_Session($key)
{
    if (isset($_SESSION[$key])) {
        return fixInput($_SESSION[$key]);
    }
    if (isset($_COOKIE[$key])) {
        return fixInput($_COOKIE[$key]);
    }
    return null;
}

function redirect($url)
{
    header("Location: " . $url);
    exit(); // Dừng quá trình sau khi chuyển hướng
}

function checkAdmin()
{
    if (empty($_SESSION['admin'])) {
        header('Location: /admin');
        exit();
    }
}
function checkLogin()
{
    if (!isset($_SESSION['user'])) {
        header('Location: /login');
        exit();
    }
}
function removeEmptyElements($array) {
    return array_filter($array, function ($item) {
        // Loại bỏ các phần tử mà tất cả giá trị đều rỗng
        return !empty(array_filter($item, function ($value) {
            return $value !== null && $value !== '';
        }));
    });
}
function handleFileUpload($fileInput, $img_old = '')
{
    if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['error'] === UPLOAD_ERR_OK) {
        if ($img_old) {
            delete_img($img_old);
        }
        $fileTmpPath = $_FILES[$fileInput]['tmp_name'];
        $fileName = $_FILES[$fileInput]['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg'];
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = './uploads/';
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }
            $dest_path = $uploadFileDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                return $newFileName;
            }
        }
    }
    return null;
}

function uploadFile($file, $uploadDir = './uploads/')
{
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['error' => 'Lỗi khi upload file'];
    }
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg'];
    if (in_array($fileExtension, $allowedfileExtensions)) {
        $newFileName = md5(time() . $file['name']) . '.' . $fileExtension;
        $uploadPath = $uploadDir . $newFileName;
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            return $newFileName;
        }
    }
    return null;
}

function delete_img($img)
{
    $imagePath = './uploads/' . $img;
    if (file_exists($imagePath) && is_file($imagePath)) {
        if (unlink($imagePath)) { // Xóa ảnh
            return true;
        }
    }
    return false;
}


function setFlash($type, $message)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
}

function getFlash()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['flash_message'])) {
        $flash = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']); // Xóa sau khi lấy
        return $flash;
    }
    return null;
}
