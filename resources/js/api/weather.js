import axios from "axios";

export const getCurrentLocation = async (location = 'Philippines') => {
    const { data } = await axios.get(
        "http://weather-app.test:8080/api/current"
    );
    return data;
};

export const getCurrentForecast = async (location = 'Philippines') => {
    const { data } = await axios.get(
        `http://weather-app.test:8080/api/current/forecast/${location}`
    );

    return data;
};
