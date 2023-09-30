export function downloadFile(data)  {
    let fileURL = window.URL.createObjectURL(new Blob([data]));
    let fileLink = document.createElement('a');
    fileLink.href = fileURL;
    fileLink.setAttribute('download', 'cv.pdf');
    document.body.appendChild(fileLink);
    fileLink.click();
}

export default {
    downloadFile
}
