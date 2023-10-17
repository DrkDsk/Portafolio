import axios from "axios";

export function downloadFile()  {
    axios({
        url: route('cv.download'),
        method: 'get',
        responseType: 'blob'
    }).then((response) => {
        let fileURL = window.URL.createObjectURL(new Blob([response.data]));
        let fileLink = document.createElement('a');
        fileLink.href = fileURL;
        fileLink.setAttribute('download', 'cv.pdf');
        document.body.appendChild(fileLink);
        fileLink.click();
    })
}

export default {
    downloadFile
}
