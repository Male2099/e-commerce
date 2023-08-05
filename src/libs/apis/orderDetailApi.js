import axios from "axios";
import orderApi from "./orderApi";
const API_URL = import.meta.env.VITE_API_BASE_URL;
const getToken = () => {
  const cookies = document.cookie.split("; ");
  const tokenCookie = cookies.find((cookie) =>
    cookie.startsWith("M-Donut-Token=")
  );
  if (!tokenCookie) {
    return false;
  }
  return decodeURIComponent(tokenCookie.split("=")[1]);
};

const orderdetails = {
  async create(data) {
    try {
      const res = await axios.post(API_URL + "/api/order-details", data, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 201) {
        return true;
      }
    } catch (err) {
      console.error(err.response.data.errors);
      await orderApi.create();
    }
    return true;
  },

  async delete(id) {
    console.log(id);
    try {
      const res = await axios.delete(API_URL + "/api/order-details/" + id, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return true;
      }
    } catch (err) {
      console.error(err.response);
    }
    return false;
  },
  async update(data) {
    try {
      const res = await axios.patch(
        API_URL + "/api/order-details/" + data.id,
        data,
        {
          headers: {
            accept: "application/json",
            "Content-Type": "application/json",
            Authorization: `Bearer ${getToken()}`,
          },
        }
      );
      if (res.status === 200) {
        return true;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
};

export default orderdetails;
