<?php
/**
 * Convert image to base64
 * @param mixed $absolutePath
 * @return string|null
 */
function imageToBase64($absolutePath)
{
    if (!file_exists($absolutePath)) 
        return null; // no file
    

    $imageData = file_get_contents($absolutePath); // read file
    $mimeType = mime_content_type($absolutePath); // read MIME
    return 'data:' . $mimeType . ';base64,' . base64_encode($imageData);
}