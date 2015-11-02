/**
 * @author Sahib J. Leo <sahib@sahib.io>
 * Date: 11/1/15 1:54 AM
 */

export default () => {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
};